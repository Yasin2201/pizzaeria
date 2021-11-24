<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-pizzas">
    <h1>Create Pizza</h1>

    <?php $form = ActiveForm::begin() ?>

        <form>
        <fieldset>

            <div class="form-group">
                <?= 
                    $form
                    ->field($pizza, 'name')
                    ->textInput(); 
                ?>

                <?= 
                    $form
                    ->field($pizza, 'description')
                    ->textInput(); 
                ?>  

            </div>

            <span><?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?></span>
            <a href=<?= yii::$app->homeUrl;?> class='btn btn-danger'>Cancel</a>
        </fieldset>
    </form>

    <?php ActiveForm::end() ?>
</div>
