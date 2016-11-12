<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * GrupoSearch represents the model behind the search form about `common\models\Grupo`.
 */
class GrupoSearch extends Grupo
{
    public $cubaNum;
    public $situacionLetra;
    public $compNum;
    public $nombreGrupo;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tipo_grupo_id', 'compartimento_id', 'situacion_id'], 'integer'],
            [['cuba_id', 'cubaNum', 'situacionLetra', 'compNum', 'nombreGrupo'], 'safe'],
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
        $query = Grupo::find();

        $totalCount = $query->count();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
                'totalCount' => $totalCount,
            ],
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'nombreGrupo' => [
                    'asc' => ['tipo_grupo.nombre_grupo' => SORT_ASC],
                    'desc' => ['tipo_grupo.nombre_grupo' => SORT_DESC],
                    'label' => 'Grupo',
                    //'default' => SORT_ASC
                ],
                'cubaNum' => [
                    'asc' => ['cuba.cuba' => SORT_ASC],
                    'desc' => ['cuba.cuba' => SORT_DESC],
                    'label' => 'Cuba'
                ],
                'compNum' => [
                    'asc' => ['compartimento.numero' => SORT_ASC],
                    'desc' => ['compartimento.numero' => SORT_DESC],
                    'label' => 'Compartimento'
                ],
                'situacionLetra' => [
                    'asc' => ['situacion.situacion_lado_letra' => SORT_ASC],
                    'desc' => ['situacion.situacion_lado_letra' => SORT_DESC],
                    'label' => 'Situación'
                ],
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            /**
             * The following line will allow eager loading with country data
             * to enable sorting by country on initial loading of the grid.
             */
            $query->joinWith(['cuba', 'tipoGrupo', 'compartimento', 'situacion']);
            return $dataProvider;
        }

        // grid filtering conditions

        $query->joinWith(['cuba' => function ($q) {
                $q->where('cuba.cuba LIKE "%' . $this->cubaNum . '%"');
            }
        ]);

        $query->joinWith(['tipoGrupo' => function ($q) {
            $q->where('tipo_grupo.nombre_grupo LIKE "%' . $this->nombreGrupo . '%"');
        }
        ]);

        $query->joinWith(['compartimento' => function ($q) {
            $q->where('compartimento.numero LIKE "%' . $this->compNum . '%"');
        }
        ]);

        $query->joinWith(['situacion' => function ($q) {
            $q->where('situacion.situacion_lado_letra LIKE "%' . $this->situacionLetra . '%"');
        }
        ]);

        return $dataProvider;
    }
}
