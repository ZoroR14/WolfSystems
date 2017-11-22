<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompraDetalleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-detalle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'precio_unitario') ?>

    <?= $form->field($model, 'iva') ?>

    <?= $form->field($model, 'sub_total') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'compra_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
