<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->idProduct], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->idProduct], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
