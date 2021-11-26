<?php

use yii\helpers\Html;

$this->title = "My Yii Application";
?>

<div>
    <h1>View Order: <?= $order->id ?></h1>
    <h3>Order Details</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col">Item Ordered</th>
                <th scope="col">Order Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?= $order->id; ?></th>
                <td><?= $order->first_name; ?></td>
                <td><?= $order->last_name; ?></td>
                <td><?= $order->contact_num; ?></td>
                <td><?= $order->email; ?></td>
                <td><?= $pizza->name; ?> Pizza</td>
                <td><?= $order->order_status; ?></td>
                <td><?= Html::a('Edit', ['editorder', 'id' => $order->id], ['class' => 'btn btn-primary']) ?></td>
            </tr>
        </tbody>
    </table>
</div>