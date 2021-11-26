<?php

$this->title = "My Yii Application";

?>

<div>
    <h1>Dashboard</h1>
    <table>
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