<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property integer $id
 * @property integer $tipo_grupo_id
 * @property integer $cuba_id
 * @property integer $compartimento_id
 * @property integer $situacion_id
 *
 * @property Compartimento $compartimento
 * @property integer compNum
 * @property Cuba $cuba
 * @property string $cubaNum
 * @property Situacion $situacion
 * @property string $situacionLetra
 * @property TipoGrupo $tipoGrupo
 * @property string $nombreGrupo
 * @property Accesorio $accesorios
 //* @property AccesorioGrupo $accesorioGrupo
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['id'], 'required'],
            [['id', 'tipo_grupo_id', 'cuba_id', 'compartimento_id', 'situacion_id'], 'integer'],
            [['compartimento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Compartimento::className(), 'targetAttribute' => ['compartimento_id' => 'id']],
            [['cuba_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cuba::className(), 'targetAttribute' => ['cuba_id' => 'id']],
            [['situacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Situacion::className(), 'targetAttribute' => ['situacion_id' => 'id']],
            [['tipo_grupo_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoGrupo::className(), 'targetAttribute' => ['tipo_grupo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipo_grupo_id' => Yii::t('app', 'Grupo'),
            'cuba_id' => Yii::t('app', 'Cuba'),
            'compartimento_id' => Yii::t('app', 'Compartimento'),
            'situacion_id' => Yii::t('app', 'Situación'),
            'cubaNum' => Yii::t('app', 'Cuba'),
            'compNum' => Yii::t('app', 'Compartimento'),
            'situacionLetra' => Yii::t('app', 'Situación'),
            'nombreGrupo' => Yii::t('app', 'Grupo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getAccesorioGrupo()
    {
        return $this->hasMany(AccesorioGrupo::className(), ['grupo_id' => 'id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompartimento()
    {
        return $this->hasOne(Compartimento::className(), ['id' => 'compartimento_id']);
    }

    /* Getter for compartimento number*/
    public function getCompNum()
    {
        return $this->compartimento->numero;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuba()
    {
        return $this->hasOne(Cuba::className(), ['id' => 'cuba_id']);
    }

    /* Getter for cuba number*/
    public function getCubaNum()
    {
        return $this->cuba->cuba;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacion()
    {
        return $this->hasOne(Situacion::className(), ['id' => 'situacion_id']);
    }

    /* Getter for situacion situacion-lado-letra*/
    public function getSituacionLetra()
    {
        return $this->situacion->situacion_lado_letra;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoGrupo()
    {
        return $this->hasOne(TipoGrupo::className(), ['id' => 'tipo_grupo_id']);
    }

    /* Getter for grupo nombre_grupo*/
    public function getNombreGrupo()
    {
        return $this->tipoGrupo->nombre_grupo;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesorios()
    {
        return $this->hasMany(Accesorio::className(), ['id' => 'accesorio_id'])->viaTable('accesorio_grupo', ['grupo_id' => 'id']);
    }

    public static function NextOrPrev($currentId)
    {
        $records = Grupo::find()->orderBy('id DESC')->all();
        $next = null;
        $prev = null;

        foreach ($records as $i => $record) {
            if ($record->id == $currentId) {
                $next = isset($records[$i - 1]->id)?$records[$i - 1]->id:null;
                $prev = isset($records[$i + 1]->id)?$records[$i + 1]->id:null;
                break;
            }
        }
        return ['next'=>$next, 'prev'=>$prev];
    }
}
