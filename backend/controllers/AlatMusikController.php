<?php

namespace backend\controllers;

use Yii;
use backend\models\AlatMusik;
use backend\models\AlatMusikSearch;
use backend\models\FIleUpload;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\components\DropdownHelpers;
use backend\models\WarnaMusik;
use backend\models\Warna;

/**
 * AlatMusikController implements the CRUD actions for AlatMusik model.
 */
class AlatMusikController extends Controller
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
     * Lists all AlatMusik models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlatMusikSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single AlatMusik model.
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
     * Creates a new AlatMusik model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionVariasi($id)
    {   
        if (Yii::$app->request->post() != null) {
            $model = new WarnaMusik();
            $arr['wm_am'] = $id;
            $arr['wm_variasi'] = Yii::$app->request->post('variasi');
            $arr['stock'] = Yii::$app->request->post('stock');
            $model->setAttributes($arr);
            $model->save();
            return $this->redirect(['variasi', 'id' => $id]);
        }
        $mwModel = WarnaMusik::find()
        ->where(['wm_am' => $id])->asArray()->all();
        return $this->render('variasi', [
            'model' => $this->findModel($id),
            'wmModel' => $mwModel,
            'id' => $id
        ]);
    }
    public function actionCreate()
    {
        $model = new AlatMusik();
        $fileUpload = new FileUpload;

        $kategori = DropdownHelpers::getKategori();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $fileUpload->imageFile = UploadedFile::getInstance($fileUpload, 'imageFile');
            if ($fileUpload->upload($model->nama, 'alat-musik')) {
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
     * Updates an existing AlatMusik model.
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
            if ($fileUpload->upload($model->nama, 'alat-musik')) {
                $model->img = $fileUpload->getImageName();
                
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $kategori = DropdownHelpers::getKategori();
        return $this->render('update', [
            'model' => $model,
            'kategori' => $kategori,
            'fileUpload' => $fileUpload,
        ]);
    }

    /**
     * Deletes an existing AlatMusik model.
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
     * Finds the AlatMusik model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AlatMusik the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AlatMusik::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
