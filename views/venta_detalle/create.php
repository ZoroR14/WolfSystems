<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\venta_detalle */

$this->title = Yii::t('app', 'Create Venta Detalle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Venta Detalles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-detalle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
