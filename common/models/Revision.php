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
            //[['cuba_id'], 'integer'],
            [['fecha_revision', 'valida_hasta', 'cuba_id'], 'safe'],
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
            'cuba_id' => Yii::t('app', 'Cuba'),
            'fecha_revision' => Yii::t('app', 'Fecha Revisión'),
            'descripcion' => Yii::t('app','Descripción'),
            'valida_hasta' => Yii::t('app','Válida Hasta'),
            'descripcion_proxima' => Yii::t('app','Descripción Próxima'),
            'autorizado' => Yii::t('app','Autorizado'),
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
