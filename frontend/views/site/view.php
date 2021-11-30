<?php

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>

<div class="site-view">
    <h1><?= $pizza->name ?></h1>
    <p><?= $pizza->description ?></p>
    <?= Html::a('Add to cart', ['add-cart', 'id' => $pizza->id, 'category' => $pizza->category], ['class' => 'btn btn-primary']) ?>
</div>