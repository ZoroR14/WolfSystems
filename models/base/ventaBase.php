<?php

namespace app\models\base;

use Yii;
use app\models\VentaDetalle;

/**
 * This is the model class for table "venta".
*
    * @property integer $id
    * @property string $nombre_cliente
    * @property string $direccion
    * @property integer $celular
    * @property integer $telefono
    *
            * @property VentaDetalle[] $ventaDetalles
    */
class ventaBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'venta';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['nombre_cliente', 'direccion'], 'required'],
            [['celular', 'telefono'], 'integer'],
            [['nombre_cliente', 'direccion'], 'string', 'max' => 45],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => Yii::t('app', 'ID'),
    'nombre_cliente' => Yii::t('app', 'Nombre Cliente'),
    'direccion' => Yii::t('app', 'Direccion'),
    'celular' => Yii::t('app', 'Celular'),
    'telefono' => Yii::t('app', 'Telefono'),
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVentaDetalles()
    {
    return $this->hasMany(VentaDetalle::className(), ['venta_detalle' => 'id']);
    }
}