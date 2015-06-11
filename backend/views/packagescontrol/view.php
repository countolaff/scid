<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Packagescontrol */

$this->title = $model->idPackage;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Packagescontrols'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packagescontrol-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idPackage], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idPackage], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPackage',
            //'idUser',
            'idFreight',
            'idOrder',
            'nameName',
            'description',
            'created_at',
            'updated_at',
            //'packageState',
            'nameState',
            'observations',
        ],
    ]) ?>

</div>
