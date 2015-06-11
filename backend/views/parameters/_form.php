<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\User;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Parameters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parameters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idParameter')->textInput()->hiddenInput() ->label(false); ?>

    <?php $model->idUser = Yii::$app->user->identity->id;?>
    <?= $form->field($model, 'idUser')->textInput()->hiddenInput() ->label(false); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'date')->textInput(['readonly' => true]) 
    echo '<label class="created_at">'.Yii::t('app', 'Created_at').'</label>';
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
 
    <?php //$form->field($model, 'date')->textInput(['readonly' => true]) 
    echo '<label class="control-label">'.Yii::t('app', 'Updated_at').'</label>';
    echo DatePicker::widget([
            'attribute' => 'updated_at',
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

    <?= $form->field($model, 'parameterCode')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('frontend', 'Create') : Yii::t('frontend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
