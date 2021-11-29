<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h1>Sides</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Sides</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sides as $side) : ?>
                <tr>
                    <td>
                        <?= Html::a('View', ['view-side', 'id' => $side->id], ['class' => 'btn btn-primary']) ?>
                        <?= $side->name; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>