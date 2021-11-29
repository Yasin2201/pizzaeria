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
    </table>
</div>