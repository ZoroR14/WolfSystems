<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
?>
<div class="producto-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'precio',
            'categoria',
            'marca',
            'modelo',
            'notas',
        ],
    ]) ?>

</div>
