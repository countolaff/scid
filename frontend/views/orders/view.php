<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */

$this->title = $model->idOrder;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idOrder',
            //'idUser',
            'date',
            'state',
            'nameState',
            'observationOrder',
            'totalValue',
        ],
    ]); ?>

</div>
    <?php ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDetailOrder',
            //'idOrder',
            'idProduct',
            'productName',
            'quantityPurchased',
            'price',
            'observationDetailorder',


            ['class' => 'yii\grid\ActionColumn',
                'template' => ''
            ],
        ],
    ]); ?>

