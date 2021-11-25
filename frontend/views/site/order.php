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
                    ->field($orders, 'first_name')
                    ->textInput(); 
                ?>

                <?= 
                    $form
                    ->field($orders, 'last_name')
                    ->textInput(); 
                ?>  

                <?= 
                    $form
                    ->field($orders, 'email')
                    ->input('email'); 
                ?>

                <?= 
                    $form
                    ->field($orders, 'contact_num')
                    ->textInput(); 
                ?>  

                <?= 
                $form
                    ->field($orders, 'pizza_id')
                    ->textInput(['readonly' => true, 'value' => $pizza_id]) 
                ?>

            </div>

            <span><?= Html::submitButton('Buy Now', ['class' => 'btn btn-success']) ?></span>
            <a href=<?= yii::$app->homeUrl;?> class='btn btn-danger'>Cancel</a>
        </fieldset>
        </form>

    <?php ActiveForm::end() ?>
</div>