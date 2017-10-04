<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ficha */

?>
<div class="ficha-create">
    <?= $this->render('_form', [
        'model' => $model,
        'recibe' => $recibe
    ]) ?>
</div>
