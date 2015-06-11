<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Freight;

/* @var $this yii\web\View */
/* @var $model backend\models\Packagescontrol */

$this->title = $model->idPackage;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Packagescontrols'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packagescontrol-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
