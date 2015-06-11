<?php

namespace backend\controllers;

use Yii;
use backend\models\Packagescontrol;
use backend\models\PackagescontrolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * PackagescontrolController implements the CRUD actions for Packagescontrol model.
 */
class PackagescontrolController extends Controller
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
     * Lists all Packagescontrol models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PackagescontrolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Packagescontrol model.
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
     * Creates a new Packagescontrol model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Packagescontrol();

        if ($model->load(Yii::$app->request->post())) {
            $query = new query;
            $max = Packagescontrol::find() // AQ instance
                ->select('max(idPackage)') // we need only one column
                ->scalar(); // cool, huh?
            $idMax = ($max + 1);
            $model->idPackage = $idMax;
            $model->save();
            return $this->redirect(['view', 'id' => $model->idPackage]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Packagescontrol model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPackage]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Packagescontrol model.
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
     * sets the shipping state selected by the user
     * @param integer $id
     * @return mixed
     */
    public function actionGetShippingState($id)
    {
        if($id == 1)
        {
            $nameState = 'Picking';
        }
        elseif($id == 2)
        {
            $nameState = 'For shipping';
        }
        elseif ($id == 3) 
        {
            $nameState = 'Shipped';
        }

        $result = array('nameState' => $nameState);

        return json_encode($result);
    }

    /**
     * Finds the Packagescontrol model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Packagescontrol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Packagescontrol::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
