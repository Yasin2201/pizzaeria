<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h1>Home</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Pizzas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pizzas as $pizza) : ?>
                <tr>
                    <td>
                        <?= Html::a('View', ['view', 'id' => $pizza->id], ['class' => 'btn btn-primary']) ?>
                        <?= $pizza->name; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
