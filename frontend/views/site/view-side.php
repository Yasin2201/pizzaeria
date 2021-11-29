<?php

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>

<div class="site-view">
    <h1><?= $side->name ?></h1>
    <p><?= $side->description ?></p>
    <?= Html::a('Add to cart', ['add-cart', 'id' => $side->id, 'category' => $side->category], ['class' => 'btn btn-primary']) ?>
</div>