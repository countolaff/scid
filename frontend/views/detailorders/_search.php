<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DetailordersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailorders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idDetailOrder') ?>

    <?= $form->field($model, 'idOrder') ?>

    <?= $form->field($model, 'idProduct') ?>

    <?= $form->field($model, 'productName') ?>

    <?= $form->field($model, 'quantityPurchased') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'observationDetailorder') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('frontend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('frontend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
