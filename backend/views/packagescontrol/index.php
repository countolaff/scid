<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PackagescontrolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Packagescontrols');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packagescontrol-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create Packagescontrol'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPackage',
            //'idUser',
            //'idFreight',
            'idOrder',
            'nameName',
            // 'description',
            'created_at',
            // 'updated_at',
            // 'packageState',
            'nameState',
            // 'observations',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
