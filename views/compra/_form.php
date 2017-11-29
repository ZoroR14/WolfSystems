<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Compra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-form">
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
 <div class="col-sm-6">
    <?= $form->field($model, 'fecha_compra')->widget(datepicker::className(), [
    'name' => 'fecha_compra',
    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
    'value' => 'Y-m-d',
     'options' => ['placeholder' => 'Seleccionar Fecha ...'],
    'pluginOptions' => [
        'autoclose'=> true,
        'format' => 'yyyy-m-dd',
        'todayHighlight' => true,
        ]
]) ?>
 </div>
    <div class="col-sm-6">
    <?= $form->field($model, 'compra')->textInput(['maxlength' => true]) ?>
</div>
     <div class="col-sm-6">
    <?= $form->field($model, 'proveedor')->widget(Select2::classname(), [
    'data' => $proveedor,
    'language' => 'de',
    'options' => ['placeholder' => 'Selecciona un Proveedor ...'],
    'pluginOptions' => [
        'allowClear' => true
            ],
]); ?>
     </div>
          <div class="col-sm-6">
    <?= $form->field($model, 'comprobante')->textInput(['maxlength' => true]) ?>
          </div>
 <div class="col-sm-6">
    <?= $form->field($model, 'ingresado_por')->textInput(['maxlength' => true]) ?>
 </div>
     <div class="col-sm-6">
    <?= $form->field($model, 'anulado')->textInput(['maxlength' => true]) ?>
     </div>
    </div>
    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-envelope"></i> Compra Detalle</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsCompraDetalle[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'cantidad',
                    'precio_unitario',
                    'iva',
                    'sub_total',
                    'total',
                    'compra_id',
                    
             
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsCompraDetalle as $i => $modelCompraDetalle): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Compra Detalle</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelCompraDetalle->isNewRecord) {
                                echo Html::activeHiddenInput($modelCompraDetalle, "[{$i}]id");
                            }
                        ?> 
                        <div class="row">
                           <div class="col-sm-4">
                        <?= $form->field($modelCompraDetalle, "[{$i}]cantidad")->textInput(['maxlength' => true]) ?>
                           </div>
                        </div>
                               <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($modelCompraDetalle, "[{$i}]precio_unitario")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelCompraDetalle, "[{$i}]iva")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($modelCompraDetalle, "[{$i}]sub_total")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelCompraDetalle, "[{$i}]total")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($modelCompraDetalle->isNewRecord ? 'Crear' : 'Actualizar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
