<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_accesorio".
 *
 * @property integer $id
 * @property string $tipo_accesorio
 *
 * @property Accesorio[] $accesorios
 */
class TipoAccesorio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_accesorio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['tipo_accesorio'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipo_accesorio' => Yii::t('app', 'Tipo Accesorio'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesorios()
    {
        return $this->hasMany(Accesorio::className(), ['tipo_accesorio_id' => 'id']);
    }
}
