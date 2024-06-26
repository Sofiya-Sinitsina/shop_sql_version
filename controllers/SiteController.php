<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\Dishes;
use app\models\forms\SingUpForm;
use app\models\LoginForm;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\ActiveDataProvider;

class SiteController extends BaseController
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
//            'verbs' => [
//                'class' => VerbFilter::class,
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
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
        return $this->render('index');
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
        return $this->renderAjax('login', [
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

    public function actionSubs()
    {

        $provider = new ActiveDataProvider([
            'query' => Yii::$app->request->get('type') ? Dishes::find()->andWhere(['type' => Yii::$app->request->get('type')]) : Dishes::find(),
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        return $this->render('subs', ['provider' => $provider, 'suffix'=>$this->suffix,]);
    }

    public function actionQa()
    {
        return $this->render('qa');
    }


    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    public function actionAdmin()
    {
        return $this->render('admin');
    }

    /**
     * @throws Exception
     */
    public function actionSing(): Response|string
    {
        $model = new SingUpForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->renderAjax('sing', [
            'model' => $model,
        ]);
    }

    public function actionSoupMenu() {

        $provider = new ActiveDataProvider([
            'query' => Dishes::find(),
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        $model = Dishes::find()->where(['type' => 'soup'])->all();

        return $this->render('subs', [
            'model' => $model,
            'provider' => $provider,
            'suffix'=>$this->suffix,
        ]);
    }
    }