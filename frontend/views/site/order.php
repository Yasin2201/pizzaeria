<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "My Yii Application";
?>

<div>
    <h1>Order</h1>
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
                    ->field($order, 'email')
                    ->input('email');
                ?>

                <?=
                $form
                    ->field($order, 'contact_num')
                    ->textInput();
                ?>

            </div>

            <span><?= Html::submitButton('Buy Now', ['class' => 'btn btn-success']) ?></span>
            <a href=<?= yii::$app->homeUrl; ?> class='btn btn-danger'>Cancel</a>
        </fieldset>
    </form>

    <?php ActiveForm::end() ?>
</div>