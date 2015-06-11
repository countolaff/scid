<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Detailorders */

$this->title = $model->idDetailOrder;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Detailorders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailorders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('frontend', 'Update'), ['update', 'id' => $model->idDetailOrder], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('frontend', 'Delete'), ['delete', 'id' => $model->idDetailOrder], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('frontend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idDetailOrder',
            'idOrder',
            'idProduct',
            'productName',
            'quantityPurchased',
            'price',
            'observationDetailorder',
        ],
    ]) ?>

</div>
