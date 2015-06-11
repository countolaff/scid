<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use frontend\models\Orders;
use frontend\models\Detailorders;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $model->idUser = Yii::$app->user->identity->id; ?>
    
    <?php $model->idOrder = 0; ?>

    <?= $form->field($model, 'idUser')->textInput()->hiddenInput() ->label(false); ?>
    
    <?= $form->field($model, 'idOrder')->textInput()->hiddenInput() ->label(false);?>
    
    <?php 
        if($model->state == 1 OR $model->state == '')
        {
            $model->state = 1;
            $model->nameState = 'draft';
            $disableDatePicker = false;
        }else{
            $model->state = 2;
            $model->nameState = 'Confirmed';
            $disableDatePicker = true;
        }
    ?>

    <?php //$form->field($model, 'date')->textInput(['readonly' => true]) 
    echo '<label class="control-label">'.Yii::t('frontend', 'Date Order').'</label>';
    echo DatePicker::widget([
            'attribute' => 'date',
            'model' => $model,
            'language' => 'es-ES',
            'readonly' => $disableDatePicker,           
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'multidate' => false,
            ]
        ]);
    ?>

    <?= $form->field($model, 'state')->textInput(['readonly' => true])->hiddenInput() ->label(false); ?>
    
    <?= $form->field($model, 'nameState')->textInput(['readonly' => true]); ?>

    <?= $form->field($model, 'observationOrder')->textInput(['maxlength' => true]) ?>
    <?php 
        if($model->totalValue == '')
        {
            $model->totalValue = 0;
        }
    ?>
    <?= $form->field($model, 'totalValue')->textInput(['readonly' => true]) ?>

    <div class="form-group">
        <?= 
            Html::submitButton($model->isNewRecord ? Yii::t('frontend', 'Create') : Yii::t('frontend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) 
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
