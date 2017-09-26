<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2 as s;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'categoria')->widget(s::className(), [
    'data' => $categoria,
    'options' => ['placeholder' => 'Seleccione una categoria'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <?= $form->field($model, 'marca')->widget(s::className(), [
    'data' => $marca,
    'options' => ['placeholder' => 'Seleccione una marca'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notas')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
