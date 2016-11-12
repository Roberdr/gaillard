<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "unidad".
 *
 * @property integer $id
 * @property string $unidad
 *
 * @property DetalleAccesorio[] $detalleAccesorios
 */
class Unidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unidad'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'unidad' => Yii::t('app', 'Unidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleAccesorios()
    {
        return $this->hasMany(DetalleAccesorio::className(), ['unidad_id' => 'id']);
    }
}
