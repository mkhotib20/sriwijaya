<?php

namespace backend\controllers;

use Yii;
use backend\models\WarnaMusik;
use backend\models\Warna;
use backend\models\WarnaMusikSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WmController implements the CRUD actions for WarnaMusik model.
 */
class WmController extends Controller
{
    public $enableCsrfValidation        = false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'create' => ['POST']
                ],
            ],
        ];
    }

    /**
     * Lists all WarnaMusik models.
     * @return mixed
     */
    public function actionIndex($am)
    {
        $dataProvider = WarnaMusikSearch::find()->where(['wm_am' => $am])->asArray()->all();
        return json_encode($dataProvider);
    }
    public function actionGetWarna()
    {
        $dataProvider = Warna::find()->asArray()->all();
        return json_encode($dataProvider);
    }

    /**
     * Displays a single WarnaMusik model.
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
     * Creates a new WarnaMusik model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function getArrayResp()
    {
        return json_decode(Yii::$app->request->post(), false);
    }
    public function actionCreate()
    {
        // echo Yii::$app->request->post('wm_');
        // exit;
        $model = new WarnaMusik();
        $model->setAttributes(Yii::$app->request->post());
        // return $model;
        // exit;
        if ($model->save()) {
            $rsp = [
                'status' => '200',
                'message' => 'Success',
                'data' => $model
            ];
        }
        else{
            $rsp = [
                'status' => '300',
                'message' => 'Failed',
                'data' => $model->getErrors()
            ];
        }
        return ($rsp);
    }

    /**
     * Updates an existing WarnaMusik model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->stock = Yii::$app->request->post('stock');
        if ($model->save()) {
            $resp = [
                'code' => '200',
                'message' => 'success',
                'data' => $model
            ];
        }
        else{
            $resp = [
                'code' => '300',
                'message' => 'Faied',
                'data' => $model->getErrors()
            ];
        }
        return json_encode($resp);

        // return $this->render('update', [
        //     'model' => $model,
        // ]);
    }

    /**
     * Deletes an existing WarnaMusik model.
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
     * Finds the WarnaMusik model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WarnaMusik the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WarnaMusik::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
