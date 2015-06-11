<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Parameters */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Parameters',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Parameters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idParameter]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="parameters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
