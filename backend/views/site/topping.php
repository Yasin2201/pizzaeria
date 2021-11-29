<?php

use yii\helpers\Html;

$this->title = "My Yii Application";
?>

<div>
    <h1>Toppings Page</h1>

    <span><?= Html::a('Create', ['/site/create-topping'], ['class' => 'btn btn-primary']) ?></span>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($toppings as $topping) : ?>
                <tr>
                    <th scope="row"><?= $topping->id; ?></th>
                    <td><?= $topping->name; ?></td>
                    <td><?= $topping->description; ?></td>
                    <td><?= Html::a('Edit', ['edit-topping', 'id' => $topping->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete-topping', 'id' => $topping->id], ['class' => 'btn btn-danger']) ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>