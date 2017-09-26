<?php

namespace app\models\base;

use Yii;
use app\models\Producto;

/**
 * This is the model class for table "marca".
*
    * @property integer $id
    * @property string $nombre
    *
            * @property Producto[] $productos
    */
class MarcaBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'marca';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 45],
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
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getProductos()
    {
    return $this->hasMany(Producto::className(), ['marca' => 'id']);
    }
}