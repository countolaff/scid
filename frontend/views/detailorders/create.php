<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Detailorders */

$this->title = Yii::t('frontend', 'Create Detailorders');
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Detailorders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailorders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,

    ]) ?>

</div>
