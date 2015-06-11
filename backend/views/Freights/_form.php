<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Freights */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="freights-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput()->hiddenInput() ->label(false);  ?>

    <?php $model->idUser = Yii::$app->user->identity->id;?>
    <?= $form->field($model, 'idUser')->textInput()->hiddenInput() ->label(false); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Observations')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'date')->textInput(['readonly' => true]) 
    echo '<label class="control-label">'.Yii::t('app', 'created_at').'</label>';
    echo DatePicker::widget([
            'attribute' => 'created_at',
            'model' => $model,
            'language' => 'es-ES',            
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'multidate' => false,
            ]
        ]);
    ?>

    <?= $form->field($model, 'state')->dropDownList(['1' => 'Activo', '0' => 'Inactivo']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
