<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use kartik\widgets\Select2;
use yii\bootstrap\Modal;
use yii\helpers\Url;

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
            //'state',
            'nameState',
            'observationOrder',
            'totalValue',
        ],
    ]) ?>

</div>
<div class="orders-detail-view">
<?php

    Modal::begin([
        'options' => [
        'id' => 'modal',
        'tabindex' => false // important for Select2 to work properly
        ],
    ]);
 
    echo "<div id='modalContent'></div>";
 
    Modal::end();
    ?>

    <?= frontend\controllers\OrdersController::getGridDetail($model->idOrder) ?> 
    
</div>

<div class="form-group">
    <?php if( $model->state == 1)
        {
           echo  Html::a('Confirm Order', ['orders/confirm-order','idOrder'=>$model->idOrder], ['class'=>'btn btn-primary']); 
        }
        ?>
</div>

<?php
$js = <<<SCRIPT
$('#deleteButton').on('click', function (e){
        var keys = \$('#gvpjax').yiiGridView('getSelectedRows');
        \$.post('index.php?r=detailorders/delete-multiple', { pk : keys },
        function () {
            \$.pjax.reload(
                {
                    container:'#gvpjax'
                }
            );
        }
    );
}); 
SCRIPT;
$this->registerJs($js);
?>