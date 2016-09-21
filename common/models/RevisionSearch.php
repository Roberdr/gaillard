<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Revision;

/**
 * RevisionSearch represents the model behind the search form about `common\models\Revision`.
 */
class RevisionSearch extends Revision
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cuba_id'], 'integer'],
            [['fecha_revision', 'descripcion', 'valida_hasta', 'descripcion_proxima', 'autorizado'], 'safe'],
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
        $query = Revision::find()->with('cuba');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
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
            'cuba_id' => $this->cuba_id,
            'fecha_revision' => $this->fecha_revision,
            'valida_hasta' => $this->valida_hasta,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'descripcion_proxima', $this->descripcion_proxima])
            ->andFilterWhere(['like', 'autorizado', $this->autorizado]);

        return $dataProvider;
    }
}
