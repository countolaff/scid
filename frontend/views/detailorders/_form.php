<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Products;

/* @var $this yii\web\View */
/* @var $model frontend\models\Detailorders ->hiddenInput() ->label(false)*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailorders-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php $model->idDetailOrder = '0'; ?>
    <?= $form->field($model, 'idDetailOrder')->textInput()->hiddenInput() ->label(false); ?>
    
    <?php $model->idOrder = $id; ?>
    <?= $form->field($model, 'idOrder')->textInput()->hiddenInput() ->label(false) ?>
    
    <?= $form->field($model,'idProduct')->dropDownList(
            ArrayHelper::map(Products::find()->all(),'idProduct','idProduct'),
            [
                'prompt'=>'Seleccione el producto',
                'onchange'=>'
                    $.post(
                        "index.php?r=detailorders/get-information-product&id="+$(this).val(),function(data){
                            var result = JSON.parse(data);
                            $("#detailorders-productname").val(result["name"]);
                            $("#detailorders-price").val(result["price"]);
                            $("#detailorders-quantitypurchased").val(result["quantityAviable"]);
                        }
                    );
                '
            ]
    )?>
    
    <?= $form->field($model, 'productName')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'quantityPurchased')->textInput()?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true,'readonly' => true]) ?>

    <?= $form->field($model, 'observationDetailorder')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('frontend', 'Create') : Yii::t('frontend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
