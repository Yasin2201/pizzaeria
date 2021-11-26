<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Pizzaeria</h1>

        <p class="lead">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            </br> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </br> Ut enim ad minim veniam.
        </p>
        <?= Html::a('View Pizzas', ['pizzas'], ['class' => 'btn btn-primary']) ?>
        </br>
        <span>OR</span>
        </br>
        <?= Html::a('Track Order', ['trackorder'], ['class' => 'btn btn-success']) ?>
    </div>
</div>