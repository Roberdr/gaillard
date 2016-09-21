<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "revision_vehiculo".
 *
 * @property integer $id
 * @property integer $id_vehiculo
 * @property integer $id_tipo_revision
 * @property string $fecha_revision
 * @property string $detalles
 * @property string $ejecutor
 *
 * @property Vehiculo $idVehiculo
 * @property TipoRevision $idTipoRevision
 */
class RevisionVehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'revision_vehiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_vehiculo', 'id_tipo_revision'], 'integer'],
            [['fecha_revision'], 'safe'],
            [['detalles'], 'string'],
            [['ejecutor'], 'string', 'max' => 45],
            [['id_vehiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculo::className(), 'targetAttribute' => ['id_vehiculo' => 'id']],
            [['id_tipo_revision'], 'exist', 'skipOnError' => true, 'targetClass' => TipoRevision::className(), 'targetAttribute' => ['id_tipo_revision' => 'id']],
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
            'id_tipo_revision' => Yii::t('app', 'Id Tipo Revision'),
            'fecha_revision' => Yii::t('app', 'Fecha Revision'),
            'detalles' => Yii::t('app', 'Detalles'),
            'ejecutor' => Yii::t('app', 'Ejecutor'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVehiculo()
    {
        return $this->hasOne(Vehiculo::className(), ['id' => 'id_vehiculo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoRevision()
    {
        return $this->hasOne(TipoRevision::className(), ['id' => 'id_tipo_revision']);
    }
}
