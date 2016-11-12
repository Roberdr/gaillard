<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AccesorioGrupo;

/**
 * AccesorioGrupoSearch represents the model behind the search form about `common\models\AccesorioGrupo`.
 */
class AccesorioGrupoSearch extends AccesorioGrupo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'grupo_id', 'accesorio_id', 'cantidad'], 'integer'],
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
        $query = AccesorioGrupo::find();

        $totalCount = $query->count();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
                'totalCount' => $totalCount,
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
            'grupo_id' => $this->grupo_id,
            'accesorio_id' => $this->accesorio_id,
            'cantidad' => $this->cantidad,
        ]);

        return $dataProvider;
    }
}
