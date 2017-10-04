<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\proveedor */
?>
<div class="proveedor-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'cedula',
            'empresa',
            'telefono',
            'celular',
            'notas:ntext',
        ],
    ]) ?>

</div>
