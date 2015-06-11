<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use yii\helpers\Url;

use backend\models\User;
use backend\models\Products;
use backend\models\Unitsmeasures;

use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'idProduct')->textInput()->hiddenInput() ->label(false); ?>
    
    <?php $model->idUser = Yii::$app->user->identity->id;?>
    <?= $form->field($model, 'idUser')->textInput()->hiddenInput() ->label(false); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantityPurchased')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amountSold')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remainingAmount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'idUnit')->dropDownList(
            ArrayHelper::map(Unitsmeasures::find()->all(),'idUnit','idUnit'),
            [
                'prompt'=>'Seleccione la unidad de medida',
                'onchange'=>'
                    $.post(
                        "index.php?r=products/get-information-units-measures&id="+$(this).val(),function(data){
                            var result = JSON.parse(data);
                            $("#products-nameunit").val(result["name"]);
                        }
                    );
                '
            ]
    )?>

    <?= $form->field($model, 'nameUnit')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'date')->textInput(['readonly' => true]) 
    echo '<label class="control-label">'.Yii::t('frontend', 'created_at').'</label>';
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
    echo '<label class="control-label">'.Yii::t('frontend', 'updated_at').'</label>';
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
    <br>
    <?= $form->field($model, 'file')->fileInput() ?>

    <?= Html::img($model->image,
        [
            'width'=>'200px',
            //'height'=>'402',
        ]
    );?>

    <br>
    <div class="form-group"><br>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('frontend', 'Create') : Yii::t('frontend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
