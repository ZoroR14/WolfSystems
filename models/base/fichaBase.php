<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "ficha".
*
    * @property integer $id
    * @property string $nombre
    * @property string $cedula
    * @property string $email
    * @property integer $telefono
    * @property integer $celular
    * @property string $fecha_recibido
    * @property string $fecha_entrega
    * @property string $recibe
    * @property string $descripcion
*/
class fichaBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'ficha';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['nombre', 'cedula', 'fecha_recibido', 'recibe'], 'required'],
            [['telefono', 'celular'], 'integer'],
            [['fecha_recibido', 'fecha_entrega'], 'safe'],
            [['descripcion'], 'string'],
            [['nombre', 'cedula', 'email', 'recibe'], 'string', 'max' => 45],
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
    'email' => Yii::t('app', 'Email'),
    'telefono' => Yii::t('app', 'Telefono'),
    'celular' => Yii::t('app', 'Celular'),
    'fecha_recibido' => Yii::t('app', 'Fecha Recibido'),
    'fecha_entrega' => Yii::t('app', 'Fecha Entrega'),
    'recibe' => Yii::t('app', 'Recibe'),
    'descripcion' => Yii::t('app', 'Descripcion'),
];
}
}