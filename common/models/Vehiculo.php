<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vehiculo".
 *
 * @property integer $id
 * @property string $marca
 * @property string $modelo
 * @property string $matricula_vehiculo
 * @property integer $id_tipo_vehiculo
 * @property string $modelo_tacografo
 * @property integer $pma
 * @property integer $tara
 * @property string $fecha_compra
 * @property string $taller_habitual
 *
 * @property MantenimientoVehiculo[] $mantenimientoVehiculos
 * @property RevisionVehiculo[] $revisionVehiculos
 * @property TipoVehiculo $idTipoVehiculo
 */
class Vehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_vehiculo', 'pma', 'tara'], 'integer'],
            [['fecha_compra'], 'safe'],
            [['marca', 'modelo', 'modelo_tacografo', 'taller_habitual'], 'string', 'max' => 45],
            [['matricula_vehiculo'], 'string', 'max' => 12],
            [['id_tipo_vehiculo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoVehiculo::className(), 'targetAttribute' => ['id_tipo_vehiculo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'marca' => Yii::t('app', 'Marca'),
            'modelo' => Yii::t('app', 'Modelo'),
            'matricula_vehiculo' => Yii::t('app', 'Matrícula'),
            'id_tipo_vehiculo' => Yii::t('app', 'Tipo Vehículo'),
            'modelo_tacografo' => Yii::t('app', 'Modelo Tacógrafo'),
            'pma' => Yii::t('app', 'PMA'),
            'tara' => Yii::t('app', 'TARA'),
            'fecha_compra' => Yii::t('app', 'Fecha Compra'),
            'taller_habitual' => Yii::t('app', 'Taller Habitual'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantenimientoVehiculos()
    {
        return $this->hasMany(MantenimientoVehiculo::className(), ['id_vehiculo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisionVehiculos()
    {
        return $this->hasMany(RevisionVehiculo::className(), ['id_vehiculo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoVehiculo()
    {
        return $this->hasOne(TipoVehiculo::className(), ['id' => 'id_tipo_vehiculo']);
    }

    /**
     * @inheritdoc
     * @return VehiculoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VehiculoQuery(get_called_class());
    }
}
