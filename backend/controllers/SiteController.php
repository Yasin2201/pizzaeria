<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use backend\models\SignupForm;
use common\models\Pizzas;
use common\models\Orders;


/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'pizzas', 'create', 'edit', 'delete', 'orders', 'view'],
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
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        // $this->layout = 'blank';

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
     * Displays Pizza page.
     *
     * @return string
     */
    public function actionPizzas()
    {
        $pizzas = Pizzas::find()->all();

        return $this->render('pizzas', [
            'pizzas' => $pizzas,
        ]);
    }

    /**
     * Displays New Pizza page.
     *
     * @return string
     */
    public function actionCreate()
    {

        $pizzas = new Pizzas();

        if (Yii::$app->request->post()) {
            $pizzas->load(Yii::$app->request->post());
            if ($pizzas->save()) {
                $this->redirect('pizzas');
            }
        }

        return $this->render('create', ['pizza' => $pizzas]);
    }

    /**
     * Displays Edit Pizza page.
     *
     * @return string
     */
    public function actionEdit($id)
    {
        $pizza = Pizzas::findOne($id);
        if ($pizza->load(Yii::$app->request->post()) && $pizza->save()) {
            $this->redirect('pizzas');
        }
        return $this->render('edit', ['pizza' => $pizza]);
    }

    /**
     * Deletes pizza from list.
     *
     * @return string
     */
    public function actionDelete($id)
    {
        $pizza = Pizzas::findOne($id);

        if (!$pizza) {
            return $this->actionPizzas();
        }

        $pizza->delete();
        return $this->actionPizzas();
    }

    /**
     * Displays orders page.
     *
     * @return string
     */
    public function actionOrders() {
        $orders = Orders::find()->all();

        return $this->render('orders', ['orders' => $orders]);
    }

    public function actionView($id) {
        $order = Orders::findOne($id);
        $pizza = Pizzas::findOne($order->pizza_id);

        return $this->render('view', ['order' => $order, 'pizza' => $pizza]);
    }
}
