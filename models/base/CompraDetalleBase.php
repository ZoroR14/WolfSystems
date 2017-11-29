<?php

namespace app\models\base;

use Yii;
use app\models\Compra;

/**
 * This is the model class for table "compra_detalle".
*
    * @property integer $id
    * @property integer $cantidad
    * @property double $precio_unitario
    * @property integer $iva
    * @property integer $sub_total
    * @property string $total
    * @property integer $compra_id
    *
            * @property Compra $compra
    */
class CompraDetalleBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'compra_detalle';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['cantidad', 'iva', 'sub_total', 'compra_id'], 'integer'],
            [['precio_unitario'], 'number'],
            [['total'], 'string', 'max' => 45],
            [['compra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::className(), 'targetAttribute' => ['compra_id' => 'id']],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'cantidad' => 'Cantidad',
    'precio_unitario' => 'Precio Unitario',
    'iva' => 'Iva',
    'sub_total' => 'Sub Total',
    'total' => 'Total',
    'compra_id' => 'Compra ID',
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getCompra()
    {
    return $this->hasOne(compra::className(), ['id' => 'compra_id']);
    }
    
}