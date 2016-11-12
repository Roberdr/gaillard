<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_revision".
 *
 * @property integer $id
 * @property string $tipo_revision
 *
 * @property RevisionVehiculo[] $revisionVehiculos
 */
class TipoRevision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_revision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_revision'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipo_revision' => Yii::t('app', 'Tipo Revision'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisionVehiculos()
    {
        return $this->hasMany(RevisionVehiculo::className(), ['id_tipo_revision' => 'id']);
    }
}
