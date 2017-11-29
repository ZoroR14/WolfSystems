<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\venta_detalleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Venta Detalles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-detalle-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Venta Detalle'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre_producto',
            'cantidad',
            'precio_unitario',
            'fecha',
            // 'vendedor',
            // 'subtotal',
            // 'total',
            // 'venta_detalle',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
