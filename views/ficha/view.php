<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ficha */
?>
<div class="ficha-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'cedula',
            'email:email',
            'telefono',
            'celular',
            'fecha_recibido',
            'fecha_entrega',
            'recibe',
            'descripcion:ntext',
        ],
    ]) ?>

</div>
