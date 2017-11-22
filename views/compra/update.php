<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Compra */

$this->title = 'Actualizar registro: '. $model->compra;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="compra-update">
    <?= $this->render('_form', [
        'model' => $model,
        'modelsCompraDetalle' => $modelsCompraDetalle,
        'proveedor' => $proveedor,
    ]) ?>

</div>
