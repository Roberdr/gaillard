<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rol_oper".
 *
 * @property integer $rol_id
 * @property integer $oper_id
 */
class RolOper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol_oper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rol_id', 'oper_id'], 'required'],
            [['rol_id', 'oper_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rol_id' => 'Rol ID',
            'oper_id' => 'Oper ID',
        ];
    }
}
