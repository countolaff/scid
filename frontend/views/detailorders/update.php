<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Detailorders */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Detailorders',
]) . ' ' . $model->idDetailOrder;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Detailorders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDetailOrder, 'url' => ['view', 'id' => $model->idDetailOrder]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="detailorders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
