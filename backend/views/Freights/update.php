<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Freights */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Freights',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Freights'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="freights-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
