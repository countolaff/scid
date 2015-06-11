<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitsMeasures */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Units Measures',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Units Measures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idUnit]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="units-measures-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
