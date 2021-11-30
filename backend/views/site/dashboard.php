<?php

$this->title = "My Yii Application";

?>

<div>
    <h1>Dashboard</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Pizza</th>
                <th scope="col">Ordered Total</th>
            </tr>
        </thead>
        <?php foreach ($pizzas as $pizza) { ?>
            <tr>
                <td>
                    <?= $pizza->name ?>
                </td>
                <td>
                    <?= count($pizza->orders) ?>
                </td>
            </tr>
        <?php } ?>
        <thead>
            <tr>
                <th scope="col">Side</th>
                <th scope="col">Ordered Total</th>
            </tr>
        </thead>
        <?php foreach ($sides as $side) { ?>
            <tr>
                <td>
                    <?= $side->name ?>
                </td>
                <td>
                    <?= count($side->orders) ?>
                </td>
            </tr>
        <?php } ?>
        <thead>
            <tr>
                <th scope="col">Topping</th>
                <th scope="col">Ordered Total</th>
            </tr>
        </thead>
        <?php foreach ($toppings as $topping) { ?>
            <tr>
                <td>
                    <?= $topping->name ?>
                </td>
                <td>
                    <?= count($topping->orders) ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>