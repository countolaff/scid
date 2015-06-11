<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => 
        [
            'idProduct',
            'idUser',
            'name',
            'description',
            'quantityPurchased',
            'amountSold',
            'remainingAmount',
            'idUnit',
            'nameUnit',
            'price',
            'created_at',
            'updated_at',
            'taxes',
            [
                'attribute'=>'Image',
                'value'=>$model->image,
                'format' => ['image',['width'=>'200','height'=>'200']],
            ],
        ],
    ]) ?>

</div>
