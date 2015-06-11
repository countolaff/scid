<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PackagescontrolSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packagescontrol-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPackage') ?>

    <?= $form->field($model, 'idUser') ?>

    <?= $form->field($model, 'idFreight') ?>

    <?= $form->field($model, 'idOrder') ?>

    <?= $form->field($model, 'nameName') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'packageState') ?>

    <?php echo $form->field($model, 'nameState') ?>

    <?php // echo $form->field($model, 'observations') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
