<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Accesorio;

/**
 * AccesorioSearch represents the model behind the search form about `common\models\Accesorio`.
 */
class AccesorioSearch extends Accesorio
{
    public $nombreAccesorio;
    public $nombreMaterial;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombreAccesorio', 'nombreMaterial', 'tipo_accesorio_id', 'material_id'], 'safe'],
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
        $query = Accesorio::find();

        $totalCount = $query->count();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
                'totalCount' => $totalCount,
            ],
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'nombreAccesorio' => [
                    'asc' => ['tipo_accesorio.tipo_accesorio' => SORT_ASC],
                    'desc' => ['tipo_accesorio.tipo_accesorio' => SORT_DESC],
                    'label' => 'Accesorio',
                ],
                'nombreMaterial' => [
                    'asc' => ['material.material' => SORT_ASC],
                    'desc' => ['material.material' => SORT_DESC],
                    'label' => 'Material',
                ],
            ]
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['tipoAccesorio', 'material']);
            return $dataProvider;
        }

        // grid filtering conditions
       /* $query->andFilterWhere([
            'tipo_accesorio_id' => $this->tipo_accesorio_id,
            'material_id' => $this->material_id,
        ]);*/

        $query->joinWith(['tipoAccesorio' => function ($q) {
            $q->where('tipo_accesorio.tipo_accesorio LIKE "%' . $this->nombreAccesorio . '%"');
        }
        ]);

        $query->joinWith(['material' => function ($q) {
            $q->where('material.material LIKE "%' . $this->nombreMaterial . '%"');
        }
        ]);

        $query->andFilterWhere(['like', 'material.material', $this->nombreMaterial]);

        return $dataProvider;
    }
}
