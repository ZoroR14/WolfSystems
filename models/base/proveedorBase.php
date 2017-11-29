<?php

namespace app\models\base;

use Yii;
use app\models\Compra;

/**
 * This is the model class for table "proveedor".
*
    * @property integer $id
    * @property string $nombre
    * @property string $cedula
    * @property string $empresa
    * @property integer $telefono
    * @property integer $celular
    * @property string $notas
    *
            * @property Compra[] $compras
    */
class proveedorBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'proveedor';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['empresa'], 'required'],
            [['telefono', 'celular'], 'integer'],
            [['notas'], 'string'],
            [['nombre', 'cedula', 'empresa'], 'string', 'max' => 45],
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
    'cedula' => Yii::t('app', 'Cedula'),
    'empresa' => Yii::t('app', 'Empresa'),
    'telefono' => Yii::t('app', 'Telefono'),
    'celular' => Yii::t('app', 'Celular'),
    'notas' => Yii::t('app', 'Notas'),
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getCompras()
    {
    return $this->hasMany(Compra::className(), ['proveedor' => 'id']);
    }
}