<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "v_listadoproductos".
*
    * @property integer $id
    * @property string $nombre
    * @property integer $precio
    * @property string $categoria
    * @property string $marca
    * @property string $modelo
    * @property string $notas
*/
class V_listadoproductosBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'v_listadoproductos';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['id', 'precio'], 'integer'],
            [['nombre', 'precio'], 'required'],
            [['nombre', 'categoria', 'marca', 'modelo', 'notas'], 'string', 'max' => 45],
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
}