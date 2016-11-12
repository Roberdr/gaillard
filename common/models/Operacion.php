<?php

namespace common\models;

use Yii;
use yii\rbac\DbManager;

/**
 * This is the model class for table "operacion".
 *
 * @property integer $id
 * @property integer $cuba_id
 * @property integer $operacion_id
 * @property string $fecha_operacion
 * @property string $descripcion
 * @property integer $operario_id
 */
class Operacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuba_id', 'operacion_id', 'operario_id'], 'integer'],
            [['fecha_operacion'], 'safe'],
            [['descripcion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cuba_id' => 'Cuba',
            'operacion_id' => 'Operación',
            'fecha_operacion' => 'Fecha Operación',
            'descripcion' => 'Descripción',
            'operario_id' => 'Operario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoOperacion()
    {
        return $this->hasOne(TipoOperacion::className(), ['id' => 'operacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuba()
    {
        return $this->hasOne(Cuba::className(), ['id' => 'cuba_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperario()
    {
        return $this->hasOne(Operario::className(), ['id' => 'operario_id']);
    }
}
