<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id
 * @property string $material
 *
 * @property Cuba[] $cubas
 * @property Cuba[] $cubas0
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'material' => 'Material',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCubas()
    {
        return $this->hasMany(Cuba::className(), ['material_exterior_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCubas0()
    {
        return $this->hasMany(Cuba::className(), ['material_interior_id' => 'id']);
    }
}
