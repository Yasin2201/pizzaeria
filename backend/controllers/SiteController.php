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
use common\models\Toppings;

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
                        'actions' => [
                            'logout',
                            'index',
                            'pizzas',
                            'create',
                            'edit',
                            'delete',
                            'orders',
                            'view',
                            'editorder',
                            'dashboard',
                            'topping',
                            'create-topping',
                            'edit-topping',
                            'delete-topping'
                        ],
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
    public function actionOrders()
    {
        $orders = Orders::find()->all();

        return $this->render('orders', ['orders' => $orders]);
    }

    /**
     * Displays specific order and details page.
     *
     * @return string
     */
    public function actionView($id)
    {
        $order = Orders::findOne($id);
        $pizza = Pizzas::findOne($order->pizza_id);

        return $this->render('view', ['order' => $order, 'pizza' => $pizza]);
    }

    /**
     * Displays order edit page.
     *
     * @return string
     */
    public function actionEditorder($id)
    {
        $order = Orders::findOne($id);
        if ($order->load(Yii::$app->request->post())) {
            $order->pizza_id = $order->pizza_id;
            $order->id = $order->id;
            $order->order_status = Yii::$app->request->post('Orders')['order_status'];
            $order->save();
            return $this->actionView($id);
        }
        return $this->render('editorder', ['order' => $order]);
    }

    /**
     * Displays dashboard page.
     *
     * @return string
     */
    public function actionDashboard()
    {
        $pizzas = Pizzas::find()->all();

        return $this->render('dashboard', ['pizzas' => $pizzas]);
    }

    /**
     * Displays topping page.
     *
     * @return string
     */
    public function actionTopping()
    {
        $toppings = Toppings::find()->all();

        return $this->render('topping', ['toppings' => $toppings]);
    }


    /**
     * Displays New Topping page and creates new toppings.
     *
     * @return string
     */
    public function actionCreateTopping()
    {

        $topping = new Toppings();

        if (Yii::$app->request->post()) {
            $topping->load(Yii::$app->request->post());
            if ($topping->save()) {
                $this->redirect('topping');
            }
        }

        return $this->render('create-topping', ['topping' => $topping]);
    }

    /**
     * Displays Edit Topping page and save edits.
     *
     * @return string
     */
    public function actionEditTopping($id)
    {
        $topping = Toppings::findOne($id);
        if ($topping->load(Yii::$app->request->post()) && $topping->save()) {
            $this->redirect('topping');
        }
        return $this->render('edit-topping', ['topping' => $topping]);
    }

    /**
     * Deletes topping from list.
     *
     * @return string
     */
    public function actionDeleteTopping($id)
    {
        $topping = Toppings::findOne($id);

        if (!$topping) {
            return $this->actionTopping();
        }

        $topping->delete();
        return $this->actionTopping();
    }
}
