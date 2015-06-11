<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use backend\models\Freights;
use backend\models\Orders;

/* @var $this yii\web\View */
/* @var $model backend\models\Packagescontrol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packagescontrol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPackage')->textInput() ?>

    <?= $form->field($model,'idUser')->dropDownList(
            ArrayHelper::map(User::find()->all(),'id','name'),
            ['prompt'=>'Seleccione el usuario']
    )?>

    <?= $form->field($model,'idFreight')->dropDownList(
            ArrayHelper::map(Freights::find()->all(),'id','name'),
            ['prompt'=>'Seleccione el transportador']
    )?>

    <?= $form->field($model, 'idOrder')->textInput() ?>

    <?= $form->field($model, 'nameName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'packageState')->textInput() ?>

    <?= $form->field($model, 'observations')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
