<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idProduct',
            //'idUser',
            'name',
            'description',
            //'quantityPurchased',
             'amountSold',
             'remainingAmount',
            // 'idUnit',
            // 'nameUnit',
            // 'price',
            // 'created_at',
            // 'updated_at',
            // 'taxes',
            [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Image',
                'value' => function ($data) 
                {
                    return Html::img($data['image'],['width' => '60px']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}'
            ],
        ],
    ]); ?>

</div>
