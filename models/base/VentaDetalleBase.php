<?php

namespace app\models\base;

use Yii;
use app\models\Venta;
use app\models\Producto;

/**
 * This is the model class for table "venta_detalle".
*
    * @property integer $id
    * @property integer $nombre_producto
    * @property integer $cantidad
    * @property integer $subtotal
    * @property integer $total
    * @property integer $venta_id
    *
            * @property Venta $venta
            * @property Producto $nombreProducto
    */
class VentaDetalleBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'venta_detalle';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['nombre_producto', 'venta_id'], 'required'],
            [['nombre_producto', 'cantidad', 'subtotal', 'total', 'venta_id'], 'integer'],
            [['venta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['venta_id' => 'id']],
            [['nombre_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['nombre_producto' => 'id']],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'nombre_producto' => 'Nombre Producto',
    'cantidad' => 'Cantidad',
    'subtotal' => 'Subtotal',
    'total' => 'Total',
    'venta_id' => 'Venta ID',
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVenta()
    {
    return $this->hasOne(Venta::className(), ['id' => 'venta_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getNombreProducto()
    {
    return $this->hasOne(Producto::className(), ['id' => 'nombre_producto']);
    }
}