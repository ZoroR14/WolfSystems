<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "v_listadovendedores".
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
class v_listadovendedoresBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'v_listadovendedores';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['id', 'telefono', 'celular'], 'integer'],
            [['nombre', 'cedula', 'fecha_recibido'], 'required'],
            [['fecha_recibido', 'fecha_entrega'], 'safe'],
            [['descripcion'], 'string'],
            [['nombre', 'cedula', 'email'], 'string', 'max' => 45],
            [['recibe'], 'string', 'max' => 255],
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