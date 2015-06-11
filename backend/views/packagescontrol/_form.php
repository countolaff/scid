<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use kartik\widgets\DatePicker;
use backend\models\Freights;
use frontend\models\Orders;

/* @var $this yii\web\View */
/* @var $model backend\models\Packagescontrol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packagescontrol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPackage')->textInput()->hiddenInput() ->label(false);  ?>

    <?php $model->idUser = Yii::$app->user->identity->id;?>
    <?= $form->field($model, 'idUser')->textInput()->hiddenInput() ->label(false); ?>

    <?= $form->field($model,'idFreight')->dropDownList(
            ArrayHelper::map(Freights::find()->all(),'id','name'),
            ['prompt'=>'Seleccione el transportador']
    )?>

    <?= $form->field($model,'idOrder')->dropDownList(
            ArrayHelper::map(Orders::find()->all(),'idOrder','idOrder'),
            ['prompt'=>'Seleccione la order a enviar']
    )?>
    <?= $form->field($model, 'nameName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

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

    <?php //$form->field($model, 'date')->textInput(['readonly' => true]) 
    echo '<label class="control-label">'.Yii::t('app', 'updated_at').'</label>';
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


    <?= $form->field($model, 'packageState')->dropDownList(['1' => 'Picking', '2' => 'For shipping', '3' => 'Shipped'],
            [
                'prompt'=>'Seleccione el estado del envio',
                'onchange'=>'
                    $.post(
                        "index.php?r=packagescontrol/get-shipping-state&id="+$(this).val(),
                        function(data)
                        {
                            var result = JSON.parse(data);
                            $("#packagescontrol-namestate").val(result["nameState"]);
                        }
                    );
                '
            ]
    )?>

    <?= $form->field($model, 'nameState')->textInput(['readonly' => true])->hiddenInput() ->label(false); ?>

    <?= $form->field($model, 'observations')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
