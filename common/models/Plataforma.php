<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plataforma".
 *
 * @property integer $id
 * @property string $matricula
 * @property string $propiedad
 * @property integer $pma
 *
 * @property Cuba[] $cubas
 */
class Plataforma extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plataforma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pma'], 'integer'],
            [['matricula', 'propiedad'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matricula' => 'Matricula',
            'propiedad' => 'Propiedad',
            'pma' => 'Pma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCubas()
    {
        return $this->hasMany(Cuba::className(), ['plataforma_id' => 'id']);
    }
}
