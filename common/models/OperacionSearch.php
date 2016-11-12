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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cuba_id'], 'integer'],
            [['fecha_operacion', 'descripcion', 'operacion_id', 'operario_id'], 'safe'],
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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('tipoOperacion');
        $query->joinWith('cuba');
        $query->joinWith('operario');

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_operacion' => $this->fecha_operacion,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'cuba.cuba', $this->cuba_id])
            ->andFilterWhere(['like', 'tipo_operacion.operacion', $this->operacion_id])
            ->andFilterWhere(['like', 'operario.nombre', $this->operario_id])
            ->andFilterWhere(['like', 'fecha_operacion', $this->fecha_operacion]);

        return $dataProvider;
    }
}
