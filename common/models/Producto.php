<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id
 * @property string iupac
 * @property string $producto
 * @property integer concentracion
 * @property integer grupo
 * @property string num_UN
 * @property string formula
 * @property integer densidad
 * @property string frases_R
 * @property string frases_S
 *
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto', 'iupac', 'formula', 'frases_R', 'frases_S'], 'string', 'max' => 45],
            [['concentracion', 'grupo', 'densidad'], 'integer'],
            [['num_UN'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iupac' => 'Nomenclatura IUPAC',
            'producto' => 'Producto',
            'concentracion' => 'Concentración',
            'grupo' => 'Grupo',
            'num_UN' => 'Número UN',
            'formula' => 'Fórmula',
            'densidad' => 'Densidad (g/l)',
            'frases_R' => 'Frases R',
            'frases_S' => 'Frases S',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompartimentos()
    {
        return $this->hasMany(Compartimento::className(), ['producto_id' => 'id']);
    }
}
