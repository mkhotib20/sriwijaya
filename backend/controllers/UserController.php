<?php

namespace backend\controllers;
// use common\models\User;
use Yii;
use backend\models\Password;
class UserController extends \yii\web\Controller
{
    public function actionChangePassword()
    {
        $model= new Password(Yii::$app->user->identity->user_id);
        if ($model->load(Yii::$app->request->post()) && $model->change()) {
            Yii::$app->session->setFlash('success', 'Sukses mengganti password');
            return $this->redirect('/');
        }
        return $this->render('index', [
            'model' => $model
        ]);
    }

}
