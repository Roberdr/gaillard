<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "caracteristica_accesorio".
 *
 * @property integer $id
 * @property string $caracteristica_accesorio
 *
 * @property DetalleAccesorio[] $detalleAccesorios
 */
class CaracteristicaAccesorio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caracteristica_accesorio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caracteristica_accesorio'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'caracteristica_accesorio' => Yii::t('app', 'Característica'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleAccesorios()
    {
        return $this->hasMany(DetalleAccesorio::className(), ['caracteristica_accesorio_id' => 'id']);
    }
}
