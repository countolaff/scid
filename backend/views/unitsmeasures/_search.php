<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitsmeasuresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="units-measures-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idUnit') ?>

    <?= $form->field($model, 'idUser') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'initialDate') ?>

    <?php // echo $form->field($model, 'modifyDate') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'math') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
