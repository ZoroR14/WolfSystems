<?php

namespace app\models\base;

use Yii;
use app\models\Producto;

/**
 * This is the model class for table "categoria".
*
    * @property integer $id
    * @property string $nombre
    *
            * @property Producto[] $productos
    */
class CategoriaBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'categoria';
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
    return $this->hasMany(Producto::className(), ['categoria' => 'id']);
    }
}