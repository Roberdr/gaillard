<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

//use yii\db\ActiveQuery;
//use common\models\Cuba;

/**
 * CubaSearch represents the model behind the search form about `common\models\Cuba`.
 */
class CubaSearch extends Cuba
{
    public $comps;
    public $capacidad;
    public $nombreMaterial;
    public $matriculaPlat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'longitud', 'ancho', 'alto', 'comps', 'capacidad', 'num_cuadro'], 'integer'],
            [['cuba', 'material_exterior_id', 'fecha_construccion', 'plataforma_id',
                'nombreMaterial', 'matriculaPlat'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cuba::find();
        $subQuery = Compartimento::find()
            ->select('cuba_id, COUNT(id) as comps')
            ->groupBy('cuba_id');
        $query->leftJoin(['numComp' => $subQuery], 'numComp.cuba_id = cuba.id');

        $subQuery2 = Compartimento::find()
            ->select('cuba_id, SUM(capacidad) as capacidad')
            ->groupBy('cuba_id');
        $query->leftJoin(['capComp' => $subQuery2], 'capComp.cuba_id = cuba.id');

        $totalCount = $query->count();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
                'totalCount' => $totalCount,
            ],
        ]);

        $dataProvider->setSort([
            'defaultOrder' => ['cuba' => SORT_ASC],
            'attributes' =>[
                'cuba',
                'num_cuadro',
                'nombreMaterial' => [
                    'asc' => ['material.material' => SORT_ASC],
                    'desc' => ['material.material' => SORT_DESC],
                    'label' => 'Material',
                    'defaultOrder' => SORT_ASC
                ],
                'comps' => [
                    'asc' => ['numComp.comps' => SORT_ASC],
                    'desc' => ['numComp.comps' => SORT_DESC],
                    'label' => 'Número de compartimentos',
                    //'default' => SORT_ASC
                ],
                'capacidad' => [
                    'asc' => ['capComp.capacidad' => SORT_ASC],
                    'desc' => ['capComp.capacidad' => SORT_DESC],
                    'label' => 'Capacidad',
                    //'default' => SORT_ASC
                ],
                'matriculaPlat' => [
                    'asc' => ['plataforma.matricula' => SORT_ASC],
                    'desc' => ['plataforma.matricula' => SORT_DESC],
                    'label' => 'Plataforma',
                    //'default' => SORT_ASC
                ],
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            /**
             * The following line will allow eager loading with country data
             * to enable sorting by country on initial loading of the grid.
             */
            $query->joinWith(['plataforma', 'materialExterior']);
            return $dataProvider;
        }
        

        $query->andFilterWhere([
            'num_cuadro' => $this->num_cuadro,
        ]);
        
        

        

        $query->joinWith(['plataforma' => function ($q) {
            $q->where('plataforma.matricula LIKE "%' . $this->matriculaPlat . '%"');
        }
        ]);

        $query->joinWith(['materialExterior' => function ($q) {
            $q->where('material.material LIKE "%' . $this->nombreMaterial . '%"');
        }
        ]);
        $query->andFilterWhere(['like', 'cuba', $this->cuba])
            ->andFilterWhere(['like', 'material.material', $this->nombreMaterial])
            ->andFilterWhere(['like', 'plataforma.matricula', $this->matriculaPlat])
            /*->andFilterWhere(['=', 'capacidad', $this->capacidad])*/;
        
        $query->andWhere(['numComp.comps' => $this->comps]);
        $query->andWhere(['capComp.capacidad' => $this->capacidad]);
        
        return $dataProvider;
    }
}
