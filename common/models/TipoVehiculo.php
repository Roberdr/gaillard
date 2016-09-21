<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_vehiculo".
 *
 * @property integer $id
 * @property string $tipo_vehiculo
 *
 * @property Vehiculo[] $vehiculos
 */
class TipoVehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_vehiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_vehiculo'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipo_vehiculo' => Yii::t('app', 'Tipo Vehiculo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::className(), ['id_tipo_vehiculo' => 'id']);
    }
}
