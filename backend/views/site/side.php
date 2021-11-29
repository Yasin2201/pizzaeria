<?php

use yii\helpers\Html;

$this->title = "My Yii Application";
?>

<div>
    <h1>Sides Page</h1>

    <span><?= Html::a('Create', ['/site/create-side'], ['class' => 'btn btn-primary']) ?></span>

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
            <?php foreach ($sides as $side) : ?>
                <tr>
                    <th scope="row"><?= $side->id; ?></th>
                    <td><?= $side->name; ?></td>
                    <td><?= $side->description; ?></td>
                    <td><?= Html::a('Edit', ['edit-side', 'id' => $side->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete-side', 'id' => $side->id], ['class' => 'btn btn-danger']) ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>