<?php

namespace common\models;

use Yii;
use yii\rbac\DbManager;

/**
 * This is the model class for table "operacion".
 *
 * @property integer $id
 * @property integer $cuba_id
 * @property integer $operacion_id
 * @property string $fecha_operacion
 * @property string $descripcion
 * @property integer $operario_id
 * @property string $cubaNum
 * @property string $nombreOperacion
 * @property string $nombreOperario
 */
class Operacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuba_id', 'operacion_id', 'operario_id'], 'integer'],
            [['fecha_operacion'], 'safe'],
            [['descripcion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cuba_id' => Yii::t('app', 'Cuba'),
            'cubaNum' => Yii::t('app', 'Cuba'),
            'operacion_id' => Yii::t('app', 'Operación'),
            'nombreOperacion' => Yii::t('app', 'Operación'),
            'fecha_operacion' => Yii::t('app', 'Fecha Operación'),
            'descripcion' => Yii::t('app', 'Descripción'),
            'operario_id' => Yii::t('app', 'Operario'),
            'nombreOperario' => Yii::t('app', 'Operario'),

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoOperacion()
    {
        return $this->hasOne(TipoOperacion::className(), ['id' => 'operacion_id']);
    }

    /* Getter for operacion name*/
    public function getNombreOperacion()
    {
        return $this->tipoOperacion->operacion;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuba()
    {
        return $this->hasOne(Cuba::className(), ['id' => 'cuba_id']);
    }

    /* Getter for cuba number*/
    public function getCubaNum()
    {
        return $this->cuba->cuba;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperario()
    {
        return $this->hasOne(Operario::className(), ['id' => 'operario_id']);
    }

    /* Getter for operario name*/
    public function getNombreOperario()
    {
        return $this->operario->apellidos . ', ' . $this->operario->nombre;
    }
}
