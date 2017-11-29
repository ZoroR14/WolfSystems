<?php

namespace app\models\base;

use Yii;
use app\models\Proveedor;
use app\models\CompraDetalle;

/**
 * This is the model class for table "compra".
*
    * @property integer $id
    * @property string $fecha_compra
    * @property string $compra
    * @property integer $proveedor
    * @property string $comprobante
    * @property string $ingresado_por
    * @property string $anulado
    *
            * @property Proveedor $proveedor0
            * @property CompraDetalle[] $compraDetalles
    */
class CompraBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'compra';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['fecha_compra'], 'required'],
            [['fecha_compra'], 'safe'],
            [['proveedor'], 'safe'],
            [['compra', 'comprobante', 'ingresado_por', 'anulado'], 'string', 'max' => 45],
            [['proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::className(), 'targetAttribute' => ['proveedor' => 'id']],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'fecha_compra' => 'Fecha Compra',
    'compra' => 'Compra',
    'proveedor' => 'Proveedor',
    'comprobante' => 'Comprobante',
    'ingresado_por' => 'Ingresado Por',
    'anulado' => 'Anulado',
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getProveedor0()
    {
    return $this->hasOne(Proveedor::className(), ['id' => 'proveedor']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getcompraDetalles()
    {
    return $this->hasMany(CompraDetalle::className(), ['compra_id' => 'id']);
    }
    
    
}