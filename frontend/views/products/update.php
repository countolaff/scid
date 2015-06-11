<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Products',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idProduct]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
