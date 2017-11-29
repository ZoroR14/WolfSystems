<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CompraDetalle */

$this->title = 'Update Compra Detalle: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Compra Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="compra-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
