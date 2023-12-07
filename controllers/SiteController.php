<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Image;
use app\models\SignupForm;
use app\models\User;
use yii\base\Model;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
     * @return string
     */
    public function actionIndex()
    {
        $model = Image::find()->all();

        return $this->render('index', [
            'model' => $model
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect('login');
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionProfile()
    {
        $model = Image::find()->all();

        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    public function actionUpload()
    {

        $model = new Image();

        $this -> uploadPost($model);

        return $this->render('upload', [
            'model' => $model,
        ]);

    }

    public function actionPost($img_id)
    {
        return $this->render('post', [
            'model' => $this->findModel($img_id),
        ]);
    }

    public function uploadPost(Image $model)
    {
        if ($model->load($this->request->post())) {

            $model -> archivo = UploadedFile::getInstance($model, 'archivo');

            if ($model->validate()) {
                if ($model->archivo) {

                    if (file_exists($model->img_img)) {
                        unlink($model->img_img);
                    }

                    $rutaArchivo = str_replace(" ", "_", $model->archivo->baseName);
                    $rutaArchivo = 'uploads/' . $rutaArchivo . date("d_m_y"). "_" . random_int(1, 100) . "." . $model->archivo->extension;

                    if ($model->archivo->saveAs($rutaArchivo)) {
                        $model-> img_img = $rutaArchivo;
                    }
                }
            }

            if ($model -> save(false)) {
                return $this->redirect(['index']);
            }
        }
    }

    protected function findModel($img_id)
    {
        if (($model = Image::findOne(['img_id' => $img_id])) !== null) {
            return $model;
        }

        //throw new NotFoundHttpException('The requested page does not exist.');
    }
}
