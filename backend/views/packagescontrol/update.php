<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Packagescontrol */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Packagescontrol',
]) . ' ' . $model->idPackage;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Packagescontrols'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPackage, 'url' => ['view', 'id' => $model->idPackage]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="packagescontrol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
