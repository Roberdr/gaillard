<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "accesorio_grupo".
 *
 * @property integer $grupo_id
 * @property integer $accesorio_id
 * @property integer $cantidad
 *
 * @property Accesorio $accesorio
 * @property Grupo $grupo
 */
class AccesorioGrupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accesorio_grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grupo_id', 'accesorio_id', 'cantidad'], 'integer'],
            [['accesorio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accesorio::className(), 'targetAttribute' => ['accesorio_id' => 'id']],
            [['grupo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['grupo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grupo_id' => Yii::t('app', 'Grupo ID'),
            'accesorio_id' => Yii::t('app', 'Accesorio ID'),
            'cantidad' => Yii::t('app', 'Cantidad'),
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
    public function getGrupo()
    {
        return $this->hasOne(Grupo::className(), ['id' => 'grupo_id']);
    }
}
