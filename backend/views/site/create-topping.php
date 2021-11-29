<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-create">
    <h1>Create Topping</h1>

    <?php $form = ActiveForm::begin() ?>

    <form>
        <fieldset>

            <div class="form-group">
                <?=
                $form
                    ->field($topping, 'name')
                    ->textInput();
                ?>

                <?=
                $form
                    ->field($topping, 'description')
                    ->textInput();
                ?>

            </div>

            <span><?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?></span>
            <a href=<?= yii::$app->homeUrl; ?> class='btn btn-danger'>Cancel</a>
        </fieldset>
    </form>

    <?php ActiveForm::end() ?>
</div>