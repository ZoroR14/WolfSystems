<?php

namespace app\models\base;

use Yii;
use app\models\User;
use app\models\VentaDetalle;

/**
 * This is the model class for table "venta".
*
    * @property integer $id
    * @property string $nombre_cliente
    * @property string $direccion
    * @property integer $celular
    * @property integer $telefono
    * @property integer $vendedor
    * @property string $fecha
    *
            * @property User $vendedor0
            * @property VentaDetalle[] $ventaDetalles
    */
class VentaBase extends \yii\db\ActiveRecord
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
            [['nombre_cliente', 'direccion', 'vendedor', 'fecha'], 'required'],
            [['celular', 'telefono', 'vendedor'], 'integer'],
            [['fecha'], 'safe'],
            [['nombre_cliente', 'direccion'], 'string', 'max' => 45],
            [['vendedor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['vendedor' => 'id']],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'nombre_cliente' => 'Nombre Cliente',
    'direccion' => 'Direccion',
    'celular' => 'Celular',
    'telefono' => 'Telefono',
    'vendedor' => 'Vendedor',
    'fecha' => 'Fecha',
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVendedor0()
    {
    return $this->hasOne(User::className(), ['id' => 'vendedor']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVentaDetalles()
    {
    return $this->hasMany(VentaDetalle::className(), ['venta_id' => 'id']);
    }
}