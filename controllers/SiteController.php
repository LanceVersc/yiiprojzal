<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Posty;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
     * @return string
     */
    public function actionIndex()
    {
        $posty = Posty::find()->all();
        
        return $this->render('home', ['posty' => $posty]);
    }

    public function actionUtworz(){
        $post = new Posty();
        $formData = Yii::$app->request->post();
        if($post->load($formData)){
            if($post->save()){
                Yii::$app->getSession()->setFlash('message', 'Post Opublikowany Pomyslnie');
                return $this->redirect(['index']);
            }
            else{
                Yii::$app->getSession()->setFlash('message', 'Nie udalo sie Opublikowac Postu');
            }
        }
        return $this->render('utworz', ['post' => $post]);
    }

    public function actionWidok($id){
        $post = Posty::findOne($id);
        return $this->render('widok', ['post' => $post]);
    }

    public function actionAktualizacja($id){
        $post = Posty::findOne($id);
        if( $post->load(Yii::$app->request->post()) && $post->save() ){
            Yii::$app->getSession()->setFlash('message', 'Post Zaktualizowany Pomyslnie');
            return $this->redirect(['index', 'id' => $post->id]);
        }
        else{
            return $this->render('aktualizacja', ['post' => $post]);
        }
        
    }
    
    public function actionUtylizacja($id){
        $post = Posty::findOne($id)->delete();
        if($post){
            Yii::$app->getSession()->setFlash('message', 'Post Usuniety Pomyslnie');
            return $this->redirect(['index']);
        }
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
    public function actionAbout()
    {
        return $this->render('about');
    }
}
