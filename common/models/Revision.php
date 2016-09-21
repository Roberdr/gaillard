<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "revision".
 *
 * @property integer $id
 * @property integer $cuba_id
 * @property string $fecha_revision
 * @property string $descripcion
 * @property string $valida_hasta
 * @property string $descripcion_proxima
 * @property string $autorizado
 *
 * @property Cuba $cuba
 */
class Revision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'revision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuba_id'], 'integer'],
            [['fecha_revision', 'valida_hasta'], 'safe'],
            [['descripcion', 'descripcion_proxima'], 'string'],
            [['autorizado'], 'string', 'max' => 45],
            [['cuba_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cuba::className(), 'targetAttribute' => ['cuba_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cuba_id' => 'Cuba ID',
            'fecha_revision' => 'Fecha Revision',
            'descripcion' => 'Descripcion',
            'valida_hasta' => 'Valida Hasta',
            'descripcion_proxima' => 'Descripcion Proxima',
            'autorizado' => 'Autorizado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuba()
    {
        return $this->hasOne(Cuba::className(), ['id' => 'cuba_id']);
    }
}
