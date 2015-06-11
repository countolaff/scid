<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Detailorders;
use frontend\models\DetailordersSearch;

use backend\models\Products;
use backend\models\Parameters;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * DetailordersController implements the CRUD actions for Detailorders model.
 */
class DetailordersController extends Controller
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
     * Lists all Detailorders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailordersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detailorders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Detailorders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id='')
    {
        $this->layout = "simple";
        $model = new Detailorders();

        if ($model->load(Yii::$app->request->post())) {
            $query = new query;
            $max = Detailorders::find() // AQ instance
                ->select('max(idDetailOrder)') // we need only one column
                ->scalar(); // cool, huh?
            $idMax = ($max + 1);
            $model->idDetailOrder = $idMax;
            $model->save();

            return $this->redirect(['orders/viewdetail', 'id' => $model->idOrder]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    /**
     * Updates an existing Detailorders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idDetailOrder]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Detailorders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteMultiple()
    {
        //$shippingId = $_POST['idShipping'];    
        $pk = Yii::$app->request->post('pk'); // Array or selected records primary keys

        // Preventing extra unnecessary query
        if (!$pk) {
            return; //$this->redirect(['/shipping/view-items', 'id' => $shippingId]);
        }

        return Detailorders::deleteAll(['idDetailOrder' => $pk]);
    }

    /**
     * Displays the data for name and price of the product 
     * @param integer $id
     * @return mixed
     */
    public function actionGetInformationProduct($id)
    {
        $modelProduct = Products::findOne($id);
        $name = $modelProduct->name;
        $price = $modelProduct->price;
        $quantityAviable = $modelProduct->remainingAmount;

        $modelParameters = Parameters::find()
                            ->Select('state')
                            ->where('parameterCode = "VEN"')
                            ->scalar();

        if($modelParameters == 0  AND $quantityAviable < 0)
        {
            $quantityAviable = "0 - no hay existencias";
        }

        $result = array('name' => $name, 
                        'price' => $price,
                        'quantityAviable' => $quantityAviable);
     return json_encode($result);
    }

    /**
     * Finds the Detailorders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Detailorders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detailorders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
