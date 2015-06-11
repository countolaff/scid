<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\editable\Editable;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */

$this->title = Yii::t('frontend', 'Create Orders');
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
       
    ]) ?>

</div>