<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UnitsmeasuresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Units Measures');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="units-measures-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Units Measures'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUnit',
            //'idUser',
            'name',
            'description',
            //'initialDate',
            // 'modifyDate',
            // 'state',
            // 'math',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
