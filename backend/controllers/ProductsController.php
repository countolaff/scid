<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\web\UploadedFile;

use backend\models\Products;
use backend\models\ProductsSearch;
use backend\models\Unitsmeasures;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post())) 
        {        
            $model->file = UploadedFile::getInstance($model,'file');
            $model->file->saveAs(Yii::getAlias('@images') .'/uploads/'. $model->file->baseName . '.' . $model->file->extension);
            $model->image = Yii::getAlias('@images') .'/uploads/'. $model->file->baseName . '.' . $model->file->extension;

            //get the idProduct for insert
            $query = new query;
            $max = Products::find() // AQ instance
                ->select('max(idProduct)') // we need only one column
                ->scalar(); // cool, huh?
            $idMax = ($max + 1);
            $model->idProduct = $idMax;
            $model->save();

            return $this->redirect(['view', 'id' => $model->idProduct]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) 
        {   
            //have to validate if the user don't need to update de image


            $root = preg_split("'/'", Yii::getAlias('@web')); //devide the dir of images in a array

            $model->file = UploadedFile::getInstance($model,'file');

            if(isset($model->file))
            {
                $model->file->saveAs(Yii::getAlias('@images') .'/uploads/'. $model->file->baseName . '.' . $model->file->extension);
                $model->image = '/'.$root[1] .'/uploads/'. $model->file->baseName . '.' . $model->file->extension;                
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->idProduct]);
        } else {

            return $this->render('update', [
                'model' => $model,
             ]);
        }
    }

    /**
     * Deletes an existing Products model.
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
     * Displays the data for name of the unit measure 
     * @param integer $id
     * @return mixed
     */
    public function actionGetInformationUnitsMeasures($id)
    {
        $modelUnitsmeasures = Unitsmeasures::findOne($id);
        $name = $modelUnitsmeasures->name;

        $result = array('name' => $name);

        return json_encode($result);
    }

    /**
    *
    */
    public function actionGetImageUrl($idOrder)
    {
        $model = $this->findModel($id);

        return Url::to($model->image, true);

    }
    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
