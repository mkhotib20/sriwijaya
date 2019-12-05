<?php

namespace backend\controllers;

use Yii;
use backend\models\JadwalGuru;
use backend\models\Jam;
use backend\models\Days;
use backend\models\Guru;
use backend\models\JadwalGuruSearch;
use backend\components\DropdownHelpers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JadwalGuruController implements the CRUD actions for JadwalGuru model.
 */
class JadwalGuruController extends Controller
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
     * Lists all JadwalGuru models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JadwalGuruSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JadwalGuru model.
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
     * Creates a new JadwalGuru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JadwalGuru();
        $jam = DropdownHelpers::getJam(new Jam());
        $days = DropdownHelpers::getDropdown(new Days());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'days' => $days,
            'jam' => $jam,
        ]);
    }

    /**
     * Updates an existing JadwalGuru model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Guru::findOne($id);
        var_dump($model);
        exit;
        $jam = DropdownHelpers::getJam(new Jam());
        $days = DropdownHelpers::getDropdown(new Days());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'days' => $days,
            'jam' => $jam,
        ]);
    }

    /**
     * Deletes an existing JadwalGuru model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $resp = [
            'code' => '200',
            'message' => 'success'
        ];
        return json_encode($resp);
    }

    /**
     * Finds the JadwalGuru model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JadwalGuru the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JadwalGuru::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
