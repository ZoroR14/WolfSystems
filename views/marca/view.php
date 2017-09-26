<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Marca */
?>
<div class="marca-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
        ],
    ]) ?>

</div>
