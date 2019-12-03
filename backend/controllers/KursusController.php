<?php

namespace backend\controllers;

use Yii;
use backend\models\Kursus;
use backend\models\KursusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\FIleUpload;

use backend\components\DropdownHelpers;
use yii\web\UploadedFile;

/**
 * KursusController implements the CRUD actions for Kursus model.
 */
class KursusController extends Controller
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
     * Lists all Kursus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KursusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kursus model.
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
     * Creates a new Kursus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kursus();

        $fileUpload = new FileUpload;

        $kategori = DropdownHelpers::getKursusKat();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $fileUpload->imageFile = UploadedFile::getInstance($fileUpload, 'imageFile');
            if ($fileUpload->upload($model->nama, 'kursus')) {
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
            'kategori' => $kategori,
            'fileUpload' => $fileUpload,
        ]);
    }

    /**
     * Updates an existing Kursus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $fileUpload = new FileUpload;

        $kategori = DropdownHelpers::getKursusKat();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $fileUpload->imageFile = UploadedFile::getInstance($fileUpload, 'imageFile');
            if ($fileUpload->upload($model->nama, 'kursus')) {
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
            'kategori' => $kategori,
            'fileUpload' => $fileUpload,
        ]);
    }

    /**
     * Deletes an existing Kursus model.
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
     * Finds the Kursus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kursus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kursus::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
