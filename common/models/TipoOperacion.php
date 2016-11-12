<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_operacion".
 *
 * @property integer $id
 * @property string $operacion
 */
class TipoOperacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operacion'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'operacion' => 'Operacion',
        ];
    }
}
