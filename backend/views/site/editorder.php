<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "My Yii Application";
?>

<div>
    <h1>Edit Order</h1>
    <?php $form = ActiveForm::begin() ?>

    <form>
        <fieldset>

            <div class="form-group">
                <?=
                $form
                    ->field($order, 'first_name')
                    ->textInput();
                ?>
                <?=
                $form
                    ->field($order, 'last_name')
                    ->textInput();
                ?>
                <?=
                $form
                    ->field($order, 'contact_num')
                    ->textInput();
                ?>
                <?=
                $form
                    ->field($order, 'email')
                    ->textInput();
                ?>
                <?php $statuses = ["In Queue" => "In Queue", "Getting Prepared" => "Getting Prepared", "Ready" => "Ready"]; ?>
                <?=
                $form
                    ->field($order, 'order_status')
                    ->dropDownList($statuses);
                ?>
            </div>

            <span><?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?></span>
            <a href=<?= yii::$app->homeUrl; ?> class='btn btn-danger'>Cancel</a>
        </fieldset>
    </form>

    <?php ActiveForm::end() ?>
</div>