<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mantenimiento_vehiculo".
 *
 * @property integer $id
 * @property integer $id_vehiculo
 * @property string $fecha_mantenimiento
 * @property integer $id_tipo_mantenimiento
 * @property string $detalle_mantenimiento
 * @property integer $id_operario
 * @property integer $kilometros
 *
 * @property Operario $idOperario
 * @property TipoMantenimiento $idTipoMantenimiento
 * @property Vehiculo $idVehiculo
 */
class MantenimientoVehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mantenimiento_vehiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_vehiculo', 'id_tipo_mantenimiento', 'id_operario', 'kilometros'], 'integer'],
            [['fecha_mantenimiento'], 'safe'],
            [['detalle_mantenimiento'], 'string', 'max' => 45],
            [['id_operario'], 'exist', 'skipOnError' => true, 'targetClass' => Operario::className(), 'targetAttribute' => ['id_operario' => 'id']],
            [['id_tipo_mantenimiento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoMantenimiento::className(), 'targetAttribute' => ['id_tipo_mantenimiento' => 'id']],
            [['id_vehiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculo::className(), 'targetAttribute' => ['id_vehiculo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_vehiculo' => Yii::t('app', 'Id Vehiculo'),
            'fecha_mantenimiento' => Yii::t('app', 'Fecha Mantenimiento'),
            'id_tipo_mantenimiento' => Yii::t('app', 'Id Tipo Mantenimiento'),
            'detalle_mantenimiento' => Yii::t('app', 'Detalle Mantenimiento'),
            'id_operario' => Yii::t('app', 'Id Operario'),
            'kilometros' => Yii::t('app', 'Kilometros'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOperario()
    {
        return $this->hasOne(Operario::className(), ['id' => 'id_operario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoMantenimiento()
    {
        return $this->hasOne(TipoMantenimiento::className(), ['id' => 'id_tipo_mantenimiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVehiculo()
    {
        return $this->hasOne(Vehiculo::className(), ['id' => 'id_vehiculo']);
    }
}
