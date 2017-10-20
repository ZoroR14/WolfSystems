<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\venta */

$this->title = Yii::t('app', 'Create Venta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsventa_detalle' => $modelsventa_detalle,
    ]) ?>

</div>
