<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "operario".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellidos
 */
class Operario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 20],
            [['apellidos'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
        ];
    }
}
