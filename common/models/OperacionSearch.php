<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
//use common\models\Operacion;

/**
 * OperacionSearch represents the model behind the search form about `common\models\Operacion`.
 */
class OperacionSearch extends Operacion
{
    public $nombreOperacion;
    public $cubaNum;
    public $nombreOperario;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cuba_id'], 'integer'],
            [['fecha_operacion', 'descripcion', 'operacion_id', 'operario_id',
            'nombreOperacion', 'cubaNum', 'nombreOperario'], 'safe'],
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
        $query = Operacion::find();

        $totalCount = $query->count();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
                'totalCount' => $totalCount,
            ],
        ]);

        $dataProvider->setSort([
            'defaultOrder' => [
                'fecha_operacion' => SORT_DESC,
            ],
            'attributes' => [
                'cubaNum' => [
                    'asc' => ['cuba.cuba' => SORT_ASC],
                    'desc' => ['cuba.cuba' => SORT_DESC],
                    'label' => 'Cuba'
                ],
                'nombreOperacion' => [
                    'asc' => ['tipo_operacion.operacion' => SORT_ASC],
                    'desc' => ['tipo_operacion.operacion' => SORT_DESC],
                    'label' => 'Operación',
                ],
                'fecha_operacion',
                'descripcion',
                'nombreOperario' => [
                    'asc' => ['operario.apellidos' => SORT_ASC, 'operario.nombre' => SORT_ASC],
                    'desc' => ['operario.apellidos' => SORT_DESC, 'operario.nombre' => SORT_DESC],
                    'label' => 'Operario'
                ],
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            /**
             * The following line will allow eager loading with country data
             * to enable sorting by country on initial loading of the grid.
             */
            $query->joinWith(['cuba', 'tipoOperacion', 'operario']);
            return $dataProvider;
        }

        // grid filtering conditions

        $query->joinWith(['cuba' => function ($q) {
            $q->where('cuba.cuba LIKE "%' . $this->cubaNum . '%"');
            }
        ]);

        $query->joinWith(['tipoOperacion' => function ($q) {
            $q->where('tipo_operacion.operacion LIKE "%' . $this->nombreOperacion . '%"');
            }
        ]);

        $query->joinWith(['operario' => function ($q) {
            $q->where('operario.nombre LIKE "%' . $this->nombreOperario. '%" OR
            operario.apellidos LIKE "%' . $this->nombreOperario . '%"');
            }
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);
            //->andFilterWhere(['like', 'tipo_operacion.operacion', $this->nombreOperacion]);


        return $dataProvider;
    }
}
