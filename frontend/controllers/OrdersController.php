<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\Url;

use frontend\models\Orders;
use frontend\models\Detailorders;
use frontend\models\DetailordersSearch;
use frontend\models\OrdersSearch;

use backend\models\Products;
use backend\models\Parameters;
use backend\models\ProductsSearch;
use backend\models\Unitsmeasures;

use kartik\grid\GridView;
use kartik\editable\Editable;
use kartik\widgets\Select2;
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new DetailordersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('idOrder="'.$id.'"'); 
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post())) 
        {
            $model->save();
            return $this->redirect(['viewdetail', 'id' => $model->idOrder]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewdetail', 'id' => $model->idOrder]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewdetail($id,$origin='')
    {

        $modelOrders = new Orders();

        $searchModel = new DetailordersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('idOrder="'.$id.'"'); 

        $potitions = "";
        // validate if there is a editable input saved via AJAX
        if (Yii::$app->request->post('hasEditable')) {

           // instantiate your book model for saving
            $idOrder = Yii::$app->request->post('editableKey');
            $potitions = Detailorders::findOne($idOrder);
     
            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
     
            // fetch the first entry in posted data (there should 
            // only be one entry anyway in this array for an 
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $post = [];
            $posted = current($_POST['Detailorders']);

            if(isset($posted["quantityPurchased"]))
            {
                 $posted["idDetailorder"] = $posted["quantityPurchased"];
            }

            $post['Detailorders'] = $posted;

            // load model like any single model validation
            if ($potitions->load($post)) {
                // can save model or do something before saving model
                $potitions->save();
                $modelOrders->save();
                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by 
                // in the input by user is updated automatically.
                $output = '';
     
                // specific use case where you need to validate a specific
                // editable column posted when you have more than one 
                // EditableColumn in the grid view. We evaluate here a 
                // check to see if buy_amount was posted for the Book model
                if (isset($posted['quantityPurchased'])) {
                  $output =  Yii::$app->formatter->asDecimal($model->quantityPurchased, 2);
                } 
                if(isset($posted["observationDetailorder"]))
                {
                    $posted["idDetailorder"] = $posted["observationDetailorder"]; 
                }
     
                // similarly you can check if the name attribute was posted as well
                // if (isset($posted['name'])) {
                //   $output =  ''; // process as you need
                // } 
                $out = Json::encode(['output'=>$output, 'message'=>'']);
            } 
            // return ajax json encoded response and exit
            echo $out;
            return;
        }

        // non-ajax - render the grid by default
        return $this->render('viewdetail', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            //'modelDetailOrders' => $modelDetailOrders,
            'searchModel' => $searchModel,
            'idOrder' => $id,
        ]);     
    }

    /**
    * Displays the kartik grid with the model id by parameters
    * @param integer $id
    */
    public function getGridDetail($id)
    {   
        $modelOrders = Orders::findOne($id);
        $modelDetailOrders = new Detailorders();
        //$modelParameters = Parameters::find()
        //$modelUnitMeasure = Unitsmeasures::find
        //$modelProducts = new Products();

        $searchModel = new DetailordersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        $dataProvider->query->where('idOrder="'.$id.'"'); 

            //`idOrder`, `idProduct`, `productName`, `quantityPurchased`, `price`, `observationDetailorder`
            $gridColumns = [
                // the name column configuration
                // the checkbox para seleccionar la fila a borrar
                [
                    'class' => '\kartik\grid\CheckboxColumn'
                ],
                // the idOrder column configuration
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute'=>'idOrder', 
                    'readonly'=> true,
                    'editableOptions' => [
                        'header' => 'idOrder',
                        'inputType' => Editable::INPUT_SPIN,
                        'options' => [
                            'pluginOptions' => ['min'=>0, 'max'=>5000]
                        ]
                    ],
                    'hAlign'=>'right', 
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    //'format'=>['decimal', 2],
                    'pageSummary' => false
                ],

                // the idProduct column configuration
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute'=>'idProduct', 
                    'readonly'=>true,
                    'editableOptions' => [
                        'header' => 'idProduct',
                        'inputType' => Editable::INPUT_SPIN,
                        'options' => [
                            'pluginOptions' => ['min'=>0, 'max'=>5000]
                        ]
                    ],
                    'hAlign'=>'right', 
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    //'format'=>['decimal', 2],
                    'pageSummary' => false
                ],

                // the productName column configuration
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute'=>'productName', 
                    'readonly'=> true,
                    'editableOptions' => [
                        'header' => 'productName',
                        'inputType' => Editable::INPUT_SPIN,
                        'options' => [
                            'pluginOptions' => ['min'=>0, 'max'=>5000]
                        ]
                    ],
                    'hAlign'=>'right', 
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    //'format'=>['decimal', 2],
                    'pageSummary' => false
                ],

                // the quantityPurchased column configuration
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute'=>'quantityPurchased', 
                    'readonly'=>true,
                    'editableOptions' => [
                        'header' => 'quantityPurchased',
                        'inputType' => Editable::INPUT_SPIN,
                        'options' => [
                            'pluginOptions' => ['min'=>0, 'max'=>5000]
                        ]
                    ],
                    'hAlign'=>'right', 
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    'format'=>['decimal', 0],
                    'pageSummary' => true
                ],

                // the price column configuration
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute'=>'price', 
                    'readonly'=>true,
                    'editableOptions' => [
                        'header' => 'price',
                        'inputType' => Editable::INPUT_SPIN,
                        'options' => [
                            'pluginOptions' => ['min'=>0, 'max'=>5000]
                        ]
                    ],
                    'hAlign'=>'right', 
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    'format'=>['decimal', 2],
                    'pageSummary' => false
                ],  

                // the observationDetailorder column configuration
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute'=>'observationDetailorder', 
                    'readonly'=>true,
                    'editableOptions' => [
                        'header' => 'observationDetailorder',
                        'inputType' => Editable::INPUT_TEXT,
                        'options' => [
                            'pluginOptions' => ['min'=>0, 'max'=>5000]
                        ]
                    ],
                    'hAlign'=>'left', 
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    //'format'=>['decimal', 2],
                    'pageSummary' => false
                ],

                //Columna para la multiplicacion por cantidades
                [
                    'class' => '\kartik\grid\FormulaColumn',
                    'attribute'=>'Total',
                    'format'=>['decimal', 2],
                    'hAlign'=>'right', 
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    'pageSummary' => true,
                    'value' => function ($model, $key, $index, $widget) {
                        $p = compact('model', 'key', 'index');
                        // Write your formula below
                        return $widget->col(4, $p) * $widget->col(5, $p);
                    }
                ]
            ];
        //end columns

        if ($modelOrders->state == 1) //if the state of the order is on draft
        {
            $grid = "<div align='right'>".

            Html::button(
                '<i class="glyphicon glyphicon-plus"></i>',
                [
                    'type' =>'button',
                    'title' => 'Add potition',
                    'value' => Url::to(['detailorders/create','id'=>$id]), 
                    'id' => 'modalButton',
                    'class'=>'btn btn-success',
                    'data-pjax' => '0',         
                ]).
            Html::button(
                '<i class="glyphicon glyphicon-minus"></i>',
                [
                    'type' =>'button',
                    'title' => 'Remove potition',
                    'id' => 'deleteButton',
                    'class'=>'btn btn-danger',
                    'data-pjax' =>  '0',    
                ])."</div>".

            GridView::widget(
                [
                    'id' => 'gvpjax',
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $potitionsSearchModel,
                    'columns' => $gridColumns,
                    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
                    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
                    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
                    'pjax' => true, //TODO: Poner a funcionar esta maricada que no está trayendo jquery en el request por ajax
                    'pjaxSettings'=>[
                    'neverTimeout'=>true,
                ],

            'toolbar' =>  [
                    ['content'=>

                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['viewdetail','id'=>$id],['class'=>'btn btn-default','id'=>'reloadGridBtn'])

                    ],
                    '{export}',
                    '{toggleData}',
                    ],
                    // set export properties
                    'export' => [
                        'fontAwesome' => true,
                    ],
                    // parameters from the demo form
                    'bordered' => true,
                    'striped' => true,
                    'condensed' => true,
                    'responsive' => true,
                    'hover' => true,
                    'showPageSummary' => true,
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => "Detail order",
                    ],
                    'persistResize' => false,
                    'exportConfig' => true,
                ]);
        }else{ //if the state of the order is on Confirmed
            $grid = "<div align='right'>".
            
            GridView::widget(
                [
                    'id' => 'gvpjax',
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $potitionsSearchModel,
                    'columns' => $gridColumns,
                    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
                    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
                    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
                    'pjax' => true, //TODO: Poner a funcionar esta maricada que no está trayendo jquery en el request por ajax
                    'pjaxSettings'=>[
                    'neverTimeout'=>true,
                ],

            'toolbar' =>  [
                    ['content'=>

                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['viewdetail','id'=>$id],['class'=>'btn btn-default','id'=>'reloadGridBtn'])

                    ],
                    '{export}',
                    '{toggleData}',
                    ],
                    // set export properties
                    'export' => [
                        'fontAwesome' => true,
                    ],
                    // parameters from the demo form
                    'bordered' => true,
                    'striped' => true,
                    'condensed' => true,
                    'responsive' => true,
                    'hover' => true,
                    'showPageSummary' => true,
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => "Detail order",
                    ],
                    'persistResize' => false,
                    'exportConfig' => true,
                ]);
        }
        return $grid;
    }

    /**
    * Changes the state of the order to confirmed with the data in state draft
    */
    public function actionConfirmOrder($idOrder="")
    {
        //get the total value of the order
        $query = new query;
        $totalOrder = Detailorders::find() // AQ instance
            ->select('sum(quantityPurchased * price)') // we need only one column
            ->where(['idOrder' => $idOrder])
            ->scalar(); // cool, huh?

        if($totalOrder > 0)
        {
            if(isset($idOrder))
            {
                //affect the inventory after the confirmation of the order
                $productsDetailOrder = Detailorders::find()
                        ->select('idOrder,idDetailorder,idProduct,quantityPurchased')
                        ->where(['idOrder' => $idOrder])
                        ->all();

                if(isset($productsDetailOrder))
                {
                    foreach ($productsDetailOrder as $productDetailOrder) 
                    {   
                        $product = $productDetailOrder->idProduct;
                        $quantityPurchased = $productDetailOrder->quantityPurchased;

                        $productModel = Products::findOne($product);
                        $productModel->amountSold = $productModel->amountSold + $quantityPurchased; //afect the sold
                        $productModel->remainingAmount = $productModel->remainingAmount - $quantityPurchased; //afect the stock
                        $productModel->save();
                    }
                }


                //save the state 2 - confirmed
                $modelOrder = Orders::findOne($idOrder); // AQ instance
                $modelOrder->state = 2;
                $modelOrder->nameState = 'Confirmed';
                $modelOrder->totalValue = $totalOrder;
                $modelOrder->save();

                return $this->redirect(['view', 'id' => $idOrder]);
            }
        }else{
            
            return $this->redirect(['orders/viewdetail', 'id' => $idOrder]);
        }
    }
}