<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "situacion".
 *
 * @property integer $id
 * @property integer $lado_cuba_numero
 * @property string $lado_cuba_nombre
 * @property integer $situacion_lado_numero
 * @property string $situacion_lado_letra
 *
 * @property Accesorio[] $accesorios
 */
class Situacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'situacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'lado_cuba_numero', 'situacion_lado_numero'], 'integer'],
            [['lado_cuba_nombre'], 'string', 'max' => 15],
            [['situacion_lado_letra'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lado_cuba_numero' => Yii::t('app', 'Lado Cuba Numero'),
            'lado_cuba_nombre' => Yii::t('app', 'Lado Cuba Nombre'),
            'situacion_lado_numero' => Yii::t('app', 'Situacion Lado Numero'),
            'situacion_lado_letra' => Yii::t('app', 'Situacion Lado Letra'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesorios()
    {
        return $this->hasMany(Accesorio::className(), ['situacion_id' => 'id']);
    }
}
