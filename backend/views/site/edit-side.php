<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-edit">
    <h1>Edit Side</h1>

    <?php $form = ActiveForm::begin() ?>

    <form>
        <fieldset>

            <div class="form-group">
                <?=
                $form
                    ->field($side, 'name')
                    ->textInput();
                ?>

                <?=
                $form
                    ->field($side, 'description')
                    ->textInput();
                ?>

            </div>

            <span><?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?></span>
            <a href=<?= yii::$app->homeUrl; ?> class='btn btn-danger'>Cancel</a>
        </fieldset>
    </form>

    <?php ActiveForm::end() ?>
</div>