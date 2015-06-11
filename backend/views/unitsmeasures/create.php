<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UnitsMeasures */

$this->title = Yii::t('backend', 'Create Units Measures');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Units Measures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="units-measures-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
