<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "boca".
 *
 * @property integer $id
 * @property integer $cuba_id
 * @property integer $compartimento_id
 * @property integer $situacion_id
 * @property integer $tipo_boca_id
 *
 * @property Compartimento $compartimento
 * @property Cuba $cuba
 * @property TipoBoca $tipoBoca
 */
class Boca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuba_id', 'compartimento_id', 'situacion_id', 'tipo_boca_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cuba_id' => 'Cuba ID',
            'compartimento_id' => 'Compartimento ID',
            'situacion_id' => 'Situacion ID',
            'tipo_boca_id' => 'Tipo Boca ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompartimento()
    {
        return $this->hasOne(Compartimento::className(), ['id' => 'compartimento_id']);
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
    public function getTipoBoca()
    {
        return $this->hasOne(TipoBoca::className(), ['id' => 'tipo_boca_id']);
    }
}
