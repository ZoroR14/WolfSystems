<?php

namespace app\models\base;

use Yii;
use app\models\Categoria;
use app\models\Marca;
use app\models\VentaDetalle;

/**
 * This is the model class for table "producto".
*
    * @property integer $id
    * @property string $nombre
    * @property integer $precio
    * @property integer $categoria
    * @property integer $marca
    * @property string $modelo
    * @property string $notas
    *
            * @property Categoria $categoria0
            * @property Marca $marca0
            * @property VentaDetalle[] $ventaDetalles
    */
class ProductoBase extends \yii\db\ActiveRecord
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
            [['nombre', 'precio', 'categoria', 'marca'], 'required'],
            [['precio', 'categoria', 'marca'], 'integer'],
            [['nombre', 'modelo', 'notas'], 'string', 'max' => 45],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria' => 'id']],
            [['marca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::className(), 'targetAttribute' => ['marca' => 'id']],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => Yii::t('app', 'ID'),
    'nombre' => Yii::t('app', 'Nombre'),
    'precio' => Yii::t('app', 'Precio'),
    'categoria' => Yii::t('app', 'Categoria'),
    'marca' => Yii::t('app', 'Marca'),
    'modelo' => Yii::t('app', 'Modelo'),
    'notas' => Yii::t('app', 'Notas'),
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getCategoria0()
    {
    return $this->hasOne(Categoria::className(), ['id' => 'categoria']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getMarca0()
    {
    return $this->hasOne(Marca::className(), ['id' => 'marca']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVentaDetalles()
    {
    return $this->hasMany(VentaDetalle::className(), ['nombre_producto' => 'id']);
    }
}