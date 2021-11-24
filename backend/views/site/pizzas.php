<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-pizzas">
    <h1>Pizzas Page</h1>

<span><?= Html::a('Create', ['/site/create'], ['class' => 'btn btn-primary']) ?></span>

<table class="table table-hover">
  <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        </tr>
  </thead>
  <tbody>
        <?php foreach($pizzas as $pizza): ?>
            <tr>
                <th scope="row"><?= $pizza->id; ?></th>
                <td><?= $pizza->name; ?></td>
                <td><?= $pizza->description; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
