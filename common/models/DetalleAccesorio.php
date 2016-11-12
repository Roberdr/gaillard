<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detalle_accesorio".
 *
 * @property integer $id
 * @property integer $accesorio_id
 * @property integer $cantidad
 * @property integer $caracteristica_accesorio_id
 * @property string $medida
 * @property integer $unidad_id
 * @property string $tipo
 *
 * @property Accesorio $accesorio
 * @property CaracteristicaAccesorio $caracteristicaAccesorio
 * @property Unidad $unidad
 */
class DetalleAccesorio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_accesorio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accesorio_id', 'cantidad', 'caracteristica_accesorio_id', 'unidad_id'], 'integer'],
            [['medida'], 'number'],
            [['tipo'], 'string', 'max' => 15],
            [['accesorio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accesorio::className(), 'targetAttribute' => ['accesorio_id' => 'id']],
            [['caracteristica_accesorio_id'], 'exist', 'skipOnError' => true, 'targetClass' => CaracteristicaAccesorio::className(), 'targetAttribute' => ['caracteristica_accesorio_id' => 'id']],
            [['unidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unidad::className(), 'targetAttribute' => ['unidad_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'accesorio_id' => Yii::t('app', 'Accesorio ID'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'caracteristica_accesorio_id' => Yii::t('app', 'Característica'),
            'medida' => Yii::t('app', 'Medida'),
            'unidad_id' => Yii::t('app', 'Unidad ID'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesorio()
    {
        return $this->hasOne(Accesorio::className(), ['id' => 'accesorio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicaAccesorio()
    {
        return $this->hasOne(CaracteristicaAccesorio::className(), ['id' => 'caracteristica_accesorio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnidad()
    {
        return $this->hasOne(Unidad::className(), ['id' => 'unidad_id']);
    }
}
