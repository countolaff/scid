<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DetailordersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Detailorders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailorders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('frontend', 'Create Detailorders'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDetailOrder',
            'idOrder',
            'idProduct',
            'productName',
            'quantityPurchased',
            // 'price',
            // 'observationDetailorder',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
