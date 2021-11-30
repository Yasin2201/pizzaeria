<?php

use yii\helpers\Html;

$this->title = "My Yii Application";
?>

<div class="site-orders">
    <h1>All Orders</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <th scope="row"><?= $order->id; ?></th>
                    <td><?= $order->first_name . " " . $order->last_name; ?></td>
                    <td><?= Html::a('View', ['view', 'id' => $order->id], ['class' => 'btn btn-primary']) ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>