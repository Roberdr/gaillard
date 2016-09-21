<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vehiculo;

/**
 * VehiculoSearch represents the model behind the search form about `common\models\Vehiculo`.
 */
class VehiculoSearch extends Vehiculo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tipo_vehiculo', 'pma', 'tara'], 'integer'],
            [['marca', 'modelo', 'matricula_vehiculo', 'modelo_tacografo', 'fecha_compra', 'taller_habitual'], 'safe'],
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
        $query = Vehiculo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_tipo_vehiculo' => $this->id_tipo_vehiculo,
            'pma' => $this->pma,
            'tara' => $this->tara,
            'fecha_compra' => $this->fecha_compra,
        ]);

        $query->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'matricula_vehiculo', $this->matricula_vehiculo])
            ->andFilterWhere(['like', 'modelo_tacografo', $this->modelo_tacografo])
            ->andFilterWhere(['like', 'taller_habitual', $this->taller_habitual]);

        return $dataProvider;
    }
}
