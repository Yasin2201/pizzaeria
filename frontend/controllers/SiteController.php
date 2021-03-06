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
use common\models\Pizzas;
use common\models\Sides;
use common\models\Orders;
use common\models\CartItems;
use common\models\OrderItems;

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
        $session = Yii::$app->session;

        if (!$session->get('currUser')) {
            $sessionid = $session->getId();
            $session->set('currUser', $sessionid);
            return $this->render('index');
        }
        return $this->render('index');
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
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
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
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
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
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
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
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
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

    public function actionView($id)
    {
        $pizza = Pizzas::findOne($id);
        return $this->render('view', ['pizza' => $pizza]);
    }

    public function actionOrder()
    {
        $session = Yii::$app->session;
        $currUserId = $session->get('currUser');
        $order = new Orders();
        $cartItems = CartItems::find()->where(['cust_id' => $currUserId])->all();
        if ($order->load(Yii::$app->request->post())) {
            $order->save();
            foreach ($cartItems as $cartItem) {
                $newOrderItem = new OrderItems();
                $newOrderItem->order_ref = $order->id;
                $newOrderItem->item_id = $cartItem->item_id;
                $newOrderItem->item_category = $cartItem->category;
                $newOrderItem->save();
            }
            CartItems::deleteAll(['cust_id' => $currUserId]);
            $session->setFlash('success', 'Your Order Has Been Placed!');
            return $this->actionIndex();
        }
        return $this->render('order', ['order' => $order]);
    }

    /**
     * Display All Pizzas Page
     */
    public function actionPizzas()
    {
        $pizzas = Pizzas::find()->all();
        return $this->render('pizzas', ['pizzas' => $pizzas]);
    }

    /**
     * Display TrackOrder Page
     */
    public function actionTrackorder()
    {
        $orderModel = new Orders;

        if (Yii::$app->request->post()) {
            $allOrders = Orders::find()->where(['contact_num' => Yii::$app->request->post('Orders')['contact_num']])->all();

            if (!$allOrders) {
                Yii::$app->session->setFlash('error', 'Contact number not found!');
                return $this->render('trackorder', ['model' => $orderModel, 'orders' => null]);
            } else {
                return $this->render('trackorder', ['model' => $orderModel, 'orders' => $allOrders]);
            }
        }

        return $this->render('trackorder', ['model' => $orderModel, 'orders' => null]);
    }

    /**
     * Render cart page and show all items in users cart
     */
    public function actionCart()
    {
        $currUser = Yii::$app->session->get('currUser');
        $cartItems = CartItems::find()->where(["cust_id" => $currUser])->all();
        return $this->render('cart', ['cartItems' => $cartItems]);
    }

    /**
     * Add item to cart
     */
    public function actionAddCart($id, $category)
    {
        $cartItem = new CartItems();
        $cartItem->cust_id = Yii::$app->session->get('currUser');
        $cartItem->item_id = $id;
        $cartItem->category = $category;
        $cartItem->save();

        Yii::$app->session->setFlash('success', 'Your item has been added to cart');
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /*
    * Displays Sides page.
    *
    * @return string
    */
    public function actionSides()
    {
        $sides = Sides::find()->all();
        return $this->render('sides', ['sides' => $sides,]);
    }

    /**
     * View single side
     */
    public function actionViewSide($id)
    {
        $side = Sides::findOne($id);
        return $this->render('view-side', ['side' => $side]);
    }
}

// Create action that takes to order page
// use users session id to check cart items table
// push all items into orders items table
// create order for those items
