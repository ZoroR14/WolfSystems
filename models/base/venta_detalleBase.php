<?php

namespace app\models\base;

use Yii;
use app\models\Venta;

/**
 * This is the model class for table "venta_detalle".
*
    * @property integer $id
    * @property integer $nombre_producto
    * @property integer $cantidad
    * @property integer $precio_unitario
    * @property string $fecha
    * @property integer $vendedor
    * @property integer $subtotal
    * @property integer $total
    * @property integer $venta_detalle
    *
            * @property Venta $ventaDetalle
    */
class venta_detalleBase extends \yii\db\ActiveRecord
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
            [['nombre_producto', 'fecha', 'venta_detalle'], 'required'],
            [['nombre_producto', 'cantidad', 'precio_unitario', 'vendedor', 'subtotal', 'total', 'venta_detalle'], 'integer'],
            [['fecha'], 'safe'],
            [['venta_detalle'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['venta_detalle' => 'id']],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => Yii::t('app', 'ID'),
    'nombre_producto' => Yii::t('app', 'Nombre Producto'),
    'cantidad' => Yii::t('app', 'Cantidad'),
    'precio_unitario' => Yii::t('app', 'Precio Unitario'),
    'fecha' => Yii::t('app', 'Fecha'),
    'vendedor' => Yii::t('app', 'Vendedor'),
    'subtotal' => Yii::t('app', 'Subtotal'),
    'total' => Yii::t('app', 'Total'),
    'venta_detalle' => Yii::t('app', 'Venta Detalle'),
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVentaDetalle()
    {
    return $this->hasOne(Venta::className(), ['id' => 'venta_detalle']);
    }
}