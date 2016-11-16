<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "accesorio".
 *
 * @property integer $id
 * @property integer $tipo_accesorio_id
 * @property integer $material_id
 *
 * @property Material $material
 * @property TipoAccesorio $tipoAccesorio
 * @property AccesorioGrupo[] $accesorioGrupo
 * @property DetalleAccesorio[] $detalleAccesorio
 * @property Grupo $grupo
 */
class Accesorio extends \yii\db\ActiveRecord
{
    public $totalCount;
    public $tipo_grupo_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accesorio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_accesorio_id', 'material_id'], 'integer'],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['tipo_accesorio_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoAccesorio::className(), 'targetAttribute' => ['tipo_accesorio_id' => 'id']],
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'totalCount',
            'tipo-grupo_id',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipo_accesorio_id' => Yii::t('app', 'Accesorio'),
            'material_id' => Yii::t('app', 'Material'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getnombreMaterial()
    {
        return $this->material->material;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoAccesorio()
    {
        return $this->hasOne(TipoAccesorio::className(), ['id' => 'tipo_accesorio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNombreAccesorio()
    {
        return $this->tipoAccesorio->tipo_accesorio;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesorioGrupo()
    {
        return $this->hasMany(AccesorioGrupo::className(), ['accesorio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleAccesorio()
    {
        return $this->hasMany(DetalleAccesorio::className(), ['accesorio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasMany(Grupo::className(), ['id' => 'grupo_id'])->viaTable('accesorio_grupo', ['accesorio_id' => 'id']);
    }

    public function getGrupoName()
    {
        $model=$this->grupo;
        return $model?$model->grupo_name:'nada';
    }

    public function getListaDetalles()
    {
        $lista = "";
        if ($this->detalleAccesorio) {
            foreach ($this->detalleAccesorio as $det) {
                $lista = $lista . ", " . $det->cantidad . "   " .
                    $det->caracteristicaAccesorio->caracteristica_accesorio . "   " .
                    $det->medida . "   " . $det->unidad->unidad . "   ";
            }
            return $this->tipoAccesorio->tipo_accesorio . ', ' . $this->material->material . ', ' . $lista;
        }
        return $this->tipoAccesorio->tipo_accesorio;
    }
}
