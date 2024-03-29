<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\UpdateForm;
use app\models\ContactForm;
use app\models\Image;
use app\models\Profile;
use app\models\SignupForm;
use app\models\User;
use yii\base\Model;
use yii\web\NotFoundHttpException;
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
        $image = Image::find()->all();
        $profile = Profile::find()->all();

        return $this->render('index', [
            'image' => $image,
            'profile' => $profile
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
            return $this->redirect($_SERVER['HTTP_REFERER']);
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

            //Obtener nombre de usuario
            $username = $model->username;
            // Obtener el ID del usuario recién creado
            $userId = User::find()->where(['username' => $username])->select('id')->scalar();

            // Crear un nuevo objeto de Profile
            $profile = new Profile();
            $profile->prof_id = $userId;
            $profile->id = $userId;
            $profile->prof_img = 'images/user_icon.png';
            $profile->prof_color = '--default';
            $profile->prof_fontcolor = '--white';
            $profile->save();

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

        return $this->redirect($_SERVER['HTTP_REFERER']);
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
    public function actionProfile($prof_id)
    {
        $image = Image::find()->where(['prof_id' => $prof_id])->all();
        $profile = Profile::findOne(['id' => $prof_id]);
        $user = User::findOne(['id' => $prof_id]);

        return $this->render('profile', [
            'image' => $image,
            'profile' => $profile,
            'user' => $user,
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
        $image = Image::findOne(['img_id' => $img_id]);

        return $this->render('post', [
            'image' => $image,
        ]);
    }

    public function actionDelete($img_id)
    {
        $image = Image::findOne(['img_id' => $img_id]);

        if (file_exists($image->img_img)) {
            unlink($image->img_img);
        }

        $image->delete();

        return $this->redirect(['profile?prof_id=' . Yii::$app->user->identity->id]);
    }

    public function actionPostedit($img_id)
    {
        $image = Image::findOne(['img_id' => $img_id]);

        $this -> actionEdit($image);

        return $this->render('postedit', [
            'image' => $image,
        ]);
    }

    public function actionEdit(Image $image)
    {
        if ($image->load($this->request->post())) {

            if ($image -> save(false)) {
                return $this->redirect(['post?img_id=' . $image->img_id]);
            }
        }
    }

    public function actionUpdate($prof_id)
    {
        $profile = Profile::findOne(['id' => $prof_id]);
        $user = User::findOne(['id' => $prof_id]);

        $this -> updateProfile($profile);

        return $this->render('update', [
            'profile' => $profile,
            'user' => $user,
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
                        $model->img_user = Yii::$app->user->identity->username;
                        $model->prof_id = Yii::$app->user->identity->id;
                    }
                }
            }

            if ($model -> save(false)) {
                return $this->redirect(['index']);
            }
        }
    }

    public function updateProfile(Profile $model)
    {
        if ($model->load($this->request->post())) {

            $model -> profpic = UploadedFile::getInstance($model, 'profpic');

            if ($model->validate()) {
                if ($model->profpic) {

                    if (file_exists($model->prof_img)) {
                        unlink($model->prof_img);
                    }

                    $rutaprofpic = 'uploads/profpics/profpic_'. Yii::$app->user->identity->username. "(" . Yii::$app->user->identity->id . ")" . "." . $model->profpic->extension;

                    if ($model->profpic->saveAs($rutaprofpic)) {
                        $model-> prof_img = 'web/'.$rutaprofpic;
                    }
                }
            }

            if ($model -> save(false)) {
                return $this->redirect(['profile?prof_id=' . Yii::$app->user->identity->id]);
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
