<?php

namespace backend\controllers;

use Yii;
use backend\models\Guru;
use backend\models\Penghargaan;
use backend\models\FIleUpload;
use backend\models\GuruSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\components\DropdownHelpers;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GuruController implements the CRUD actions for Guru model.
 */
class GuruController extends Controller
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
     * Lists all Guru models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GuruSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Guru model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // penghargaan
    public function actionPenghargaan($id)
    {   
        if (Yii::$app->request->post() != null) {
            
            return $this->redirect(['penghargaan', 'id' => $id]);
        }
        $penghargaan = Penghargaan::find()
        ->where(['p_guru' => $id])->asArray()->all();
        return $this->render('penghargaan', [
            'model' => $this->findModel($id),
            'penghargaan' => $penghargaan,
            'id' => $id
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Guru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Guru();
        $fileUpload = new FileUpload;
        $kursus = DropdownHelpers::getKursus();

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $fileUpload->imageFile = UploadedFile::getInstance($fileUpload, 'imageFile');
            if ($fileUpload->upload($model->nama, 'guru')) {
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
            'kursus' => $kursus
        ]);
    }

    /**
     * Updates an existing Guru model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fileUpload = new FileUpload;
        $kursus = DropdownHelpers::getKursus();

        
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $fileUpload->imageFile = UploadedFile::getInstance($fileUpload, 'imageFile');
            if ($fileUpload->upload($model->nama, 'guru')) {
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
            'kursus' => $kursus
        ]);
    }

    /**
     * Deletes an existing Guru model.
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
     * Finds the Guru model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Guru the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Guru::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
