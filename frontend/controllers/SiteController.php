<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\AmKategori;
use backend\models\AlatMusik;
use backend\models\Kursus;
use frontend\components\Filter;
use backend\models\Guru;
use backend\models\Feedback;
use backend\models\KursusKategori;
/**
 * Site controller
 */
class SiteController extends \frontend\controllers\BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Feedback();
        
        if (null!==(Yii::$app->request->post())) {
            $model->setAttributes(Yii::$app->request->post());
            if ($model->save()) {
                Yii::$app->session->setFlash("msg", 'Masukan Anda telah tersampaikan');
                return $this->redirect('/');
            }
        }
        $kategori = AlatMusik::find()->select(['alat_musik.kategori', 'alat_musik.img', 'am_kategori.*'])
        ->joinWith('am_kategori')->asArray()->groupBy('kategori')->all();

        // $kategori = AmKategori::find()->asArray()->all();
        $guru = Guru::find()
        ->select(['guru.*', 'kursus.nama as mengajar_kursus'])
        ->joinWith('kursus')
        ->limit(4)
        ->orderBy('updated_at DESC')
        ->asArray()->all();
        $katKursus = KursusKategori::find()->asArray()->all();
        return $this->render('index', [
            'kategori' => $kategori,
            'katKursus' => $katKursus,
            'guru' => $guru
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionDetailAlatMusik($id)
    {
        // print_r(AlatMusik::getSingle(['alat_musik.*'],['alat_musik.id' => $id],'am_kategori'));\
        $pages = AlatMusik::getForPagination();
    }
    
    public function actionKursus($kat=0, $filter=0)
    {
        $src_key = isset($_GET['src_key']) ? $_GET['src_key'] : '';
        $allMusik = Kursus::getCount(); 
        $filters = Filter::getFilters();
        $guru = Guru::find()
        ->select(['guru.*', 'kursus.nama as mengajar_kursus'])
        ->joinWith('kursus')
        ->limit(4)
        ->orderBy('updated_at DESC')
        ->asArray()->all();
        if ($kat==0) {
            $countAll = $allMusik; 
            $query = Kursus::getQuery(['kursus.*', 'kursus_kategori.nama as kat_nama'], [], 'kursus_kategori', $src_key);
        }
        else{
            $countAll = Kursus::getCount(['kategori' => $kat]);   
            $query = Kursus::getQuery(['kursus.*', 'kursus_kategori.nama as kat_nama'], ['kategori' => $kat], 
            'kursus_kategori', $src_key)   ;    
        }
        
        $query = Kursus::getOrderedItems($query, $filter);
        $countAm = Kursus::find()->select(['kursus.*', 'count(kursus.id) as jumlahKat',  'kursus_kategori.nama as namaKat'])
        ->joinWith('kursus_kategori')->asArray()->groupBy('kategori')->all();
        foreach ($countAm as $key => $value) {
            if ($kat==$value['kategori']) {
                $countAm[$key]['isActive'] = true;
            }
            else{
                $countAm[$key]['isActive'] = false;

            }
        }
        $pages = AlatMusik::getForPagination(['kategori' => $kat], 6);
        $alat_musik = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('kursus', [
            'kategori' => $countAm,
            'countAll' => AlatMusik::$count,
            'alat_musik' => $alat_musik,
            'selectedKat' => $kat,
            'allMusik' => $allMusik,
            'pages' => $pages,
            'filters' => $filters,
            'filterSelected' => $filter,
            'guru' => $guru,
            'query_result' => $this
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $data = \backend\models\Sejarah::find()->asArray()->all();
        return $this->render('about', [
            'sejarah' => $data
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
