<?php

namespace common\models;

use yii;
use yii\db\ActiveRecord;
//use yii\behaviors\BlameableBehavior;
//use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cuba".
 *
 * @property integer $id
 * @property string $cuba
 * @property integer $num_cuadro
 * @property string $codigo
 * @property integer $peso_bruto
 * @property integer $tara
 * @property integer $material_exterior_id
 * @property string $fecha_construccion
 * @property integer $plataforma_id
 * @property integer $longitud
 * @property integer $ancho
 * @property integer $alto
 * @property float $espesor_cuerpo
 * @property float $espesor_fondo
 * @property string $prueba_hidraulica
 * @property string $autoridad
 * @property string $num_homologacion
 * @property integer $num_fabricacion
 * @property float $presion_prueba
 * @property float $presion_servicio
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Compartimento[] $compartimentos
 * @property integer $comps
 * @property integer $capacidad
 * @property Material $materialExterior
 * @property string $nombreMaterial
 * @property Plataforma $plataforma
 * @property string $matriculaPlat
 * @property Revision[] $revisiones
 */
class Cuba extends ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuba';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuba'], 'required'],
            [['id', 'material_exterior_id', 'plataforma_id', 'longitud', 'ancho', 'alto',
                    'peso_bruto', 'tara', 'num_fabricacion', 'peso_max_producto' ], 'integer'],
            [['espesor_cuerpo', 'espesor_fondo', 'presion_prueba', 'presion_servicio_ADR'], 'number'],
            [['prueba_hidraulica'], 'date'],
            [['codigo'], 'string', 'max' => 7],
            [['cuba'], 'string', 'max' => 10],
            [['autoridad'], 'string', 'max' => 45],
            [['num_homologacion'], 'string', 'max' => 15],
            [['num_cuadro'], 'integer', 'min' => 0, 'max' => 9],
            [['fecha_construccion',  'created_by', 'updated_by'], 'safe'],
            [['created_at', 'updated_at',], 'default', 'value' => date('Y-m-d'), 'on' => 'create']
        ];
    }
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cuba' => 'Cuba',
            'num_cuadro' => 'Cuadro',
            'codigo' => 'Código',
            'peso_bruto' => 'P. Bruto',
            'tara' => 'T.A.R.A.',
            'material_exterior_id' => 'Material Construcción',
            'fecha_construccion' => 'Fecha Construcción',
            'plataforma_id' => 'Plataforma',
            'longitud' => 'Longitud',
            'ancho' => 'Ancho',
            'alto' => 'Alto',
            'espesor_cuerpo' => 'Espesor cuerpo(mm)',
            'espesor_fondo' => 'Espesor fondo(mm)',
            'codigo_diseno' => 'Código de Diseño',
            'prueba_hidraulica' => 'Prueba Hidráulica Inicial',
            'presion_servicio_ADR' => 'Presión de Servicio ADR/RID',
            'presion_servicio_IMO' => 'Presión de Servicio IMO',
            'presion_exterior' => 'Presión Exterior Máx.',
            'presion_tarado_valvulas' => 'P. Tarado Válvulas de Seguridad',
            'temperatura_calculo_referencia' => 'Temperatura Cálculo de Referencia',
            'peso_max_producto' => 'Peso Máx. Producto',
            'num_aprobacion_CSC' => 'Nº Aprobación CSC',
            'peso_max_apilamiento' => 'Peso Máx. Apilamiento 1,8G',
            'carga_rigidez' => 'Carga Máx. Prueba Rigidez',
            'comps' => 'Número de Compartimentos',
            'capacidad' => 'Capacidad Total (l) ',
            'nombreMaterial' => Yii::t('app', 'Material'),
            'matriculaPlat' => Yii::t('app', 'Plataforma'),
        ];
    }

   

       /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompartimentos()
    {
        return $this->hasMany(Compartimento::className(), ['cuba_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComps()
    {
        return $this->hasMany(Compartimento::className(), ['cuba_id' => 'id'])->count('compartimento.id');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialExterior()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_exterior_id']);
    }

    /* Getter for Material Name */
    public function getNombreMaterial()
    {
        return $this->materialExterior->material;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlataforma()
    {
        return $this->hasOne(Plataforma::className(), ['id' => 'plataforma_id']);
    }

    /* Getter for Matricula Plataforma*/
    public function getMatriculaPlat()
    {
        if ($this->plataforma->matricula != null)
        {
            return $this->plataforma->matricula;
        }
        return '';
    }

   /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisiones()
    {
        return $this->hasMany(Revision::className(), ['cuba_id' => 'id']);
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapacidad()
    {
        return $this->hasMany(Compartimento::className(), ['cuba_id' => 'id'])->sum('compartimento.capacidad');
    }

    public static function NextOrPrev($currentId)
    {
        $records = Cuba::find()->orderBy('cuba DESC')->all();
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['cuba_id' => 'id']);
    }
}
