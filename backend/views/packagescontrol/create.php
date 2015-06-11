<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Packagescontrol */

$this->title = Yii::t('backend', 'Create Packagescontrol');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Packagescontrols'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packagescontrol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
