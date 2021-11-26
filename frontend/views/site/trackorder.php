<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "My Yii Application";
?>

<div>
    <h1>Track Your Order</h1>

    <?php $form = ActiveForm::begin() ?>

    <form>
        <fieldset>

            <div class="form-group">
                <?=
                $form
                    ->field($model, 'contact_num')
                    ->textInput();
                ?>
            </div>

            <span><?= Html::submitButton('Track', ['class' => 'btn btn-success']) ?></span>
        </fieldset>
    </form>

    <?php ActiveForm::end() ?>

    <?php if ($orders) { ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Order Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <th scope="row">
                            <?= $order->id; ?>
                        </th>
                        <td>
                            <?= $order->first_name . ' ' . $order->last_name; ?>
                        </td>
                        <td>
                            <?= $order->email; ?>
                        </td>
                        <td>
                            <?= $order->contact_num; ?>
                        </td>
                        <td>
                            <?= $order->order_status; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } ?>
</div>