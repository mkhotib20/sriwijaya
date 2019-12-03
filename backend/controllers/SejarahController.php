<?php

namespace backend\controllers;

use Yii;
use backend\models\Sejarah;
use backend\models\SejarahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\FIleUpload;
use yii\web\UploadedFile;

/**
 * SejarahController implements the CRUD actions for Sejarah model.
 */
class SejarahController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Sejarah models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SejarahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sejarah model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sejarah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sejarah();

        
        $fileUpload = new FileUpload;
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $fileUpload->imageFile = UploadedFile::getInstance($fileUpload, 'imageFile');
            if ($fileUpload->upload($model->judul, 'sejarah')) {
                $model->img = $fileUpload->getImageName();
                
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'fileUpload' => $fileUpload,
        ]);
    }

    /**
     * Updates an existing Sejarah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $fileUpload = new FileUpload;
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $fileUpload->imageFile = UploadedFile::getInstance($fileUpload, 'imageFile');
            if ($fileUpload->upload($model->judul, 'sejarah')) {
                $model->img = $fileUpload->getImageName();
                
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'fileUpload' => $fileUpload,
        ]);
    }

    /**
     * Deletes an existing Sejarah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sejarah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sejarah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sejarah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
