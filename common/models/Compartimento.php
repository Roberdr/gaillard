<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "compartimento".
 *
 * @property integer $id
 * @property integer $cuba_id
 * @property integer $numero
 * @property integer $capacidad
 * @property integer $producto_id
 *
 * @property Cuba $cuba
 * @property Producto $producto
 * @property Material $materialInterior
 */
class Compartimento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compartimento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuba_id', 'numero', 'capacidad', 'producto_id', 'material_interior_id'], 'integer'],
            [['id'], 'safe'],
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
            'numero' => 'Numero',
            'capacidad' => 'Capacidad',
            'producto_id' => 'Producto',
            'material_interior_id' => 'Material Interior',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBocas()
    {
        return $this->hasMany(Boca::className(), ['compartimento_id' => 'id']);
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
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialInterior()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_interior_id']);
    }
}
