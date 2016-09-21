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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'longitud', 'ancho', 'alto'], 'integer'],
            [['cuba', 'material_exterior_id', 'fecha_construccion', 'plataforma_id',
                'capacidad', 'comps'], 'safe'],
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

    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'capacidad',
            'comps'
        ]);
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
        $query = Cuba::find()->with([
            'materialExterior',
            'plataforma',
            'compartimentos',
            'revisiones'
        ]);

        $totalCount = $query->count();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
                'totalCount' => $totalCount,
            ],
        ]);

        $dataProvider->sort->attributes['capacidad'] = [
            'asc' => ['capacidad' => SORT_ASC],
            'desc' => ['capacidad' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['comps'] = [
            'asc' => ['comps' => SORT_ASC],
            'desc' => ['comps' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_construccion' => $this->fecha_construccion,
            'capacidad' => $this->capacidad,
            'longitud' => $this->longitud,
            'comps' => $this->comps,
            'ancho' => $this->ancho,
            'alto' => $this->alto,
        ]);

        $query->andFilterWhere(['like', 'cuba', $this->cuba])
            ->andFilterWhere(['like', 'material.material', $this->material_exterior_id])
            ->andFilterWhere(['like', 'plataforma.matricula', $this->plataforma_id]);
        

        
        return $dataProvider;
    }
}
