<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_grupo".
 *
 * @property integer $id
 * @property string $nombre_grupo
 *
 * @property Grupo[] $grupos
 */
class TipoGrupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_grupo'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre_grupo' => Yii::t('app', 'Nombre Grupo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['tipo_grupo_id' => 'id']);
    }
}
