<?php

use yii\helpers\Html;
use kartik\editable\Editable;
use kartik\widgets\Select2;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Orders',
]) . ' ' . $model->idOrder;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idOrder, 'url' => ['view', 'id' => $model->idOrder]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>