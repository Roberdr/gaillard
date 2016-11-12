<?php

namespace backend\models;

use Yii;
use common\models\User;
use backend\models\RolOper;
use backend\models\Oper;

/**
 * This is the model class for table "rol".
 *
 * @property integer $id
 * @property string $nombre
 */
class Rol extends \yii\db\ActiveRecord
{
    public $opers;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 32],
            ['opers', 'safe']
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
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        \Yii::$app->db->createCommand()->delete('rol_oper', 'rol_id= ' . (int) $this->id)->execute();

        foreach ($this->opers as $id)
        {
            $ro = new RolOper();
            $ro->rol_id = $this->id;
            $ro->oper_id = $id;
            $ro->save();
        }
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['rol_id' => 'id']);
    }

    public function getRolOpers()
    {
        return $this->hasMany(RolOper::className(), ['rol_id' => 'id']);
    }

    public function getOperacionesPermitidas()
    {
        return $this->hasMany(Oper::className(), ['id' => 'oper_id'])
            ->viaTable('rol_oper', ['rol_id' => 'id']);
    }

    public function getOperacionesPermitidasList()
    {
        return $this->getOperacionesPermitidas()->asArray();
    }
}
