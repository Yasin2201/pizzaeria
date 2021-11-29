<?php
$this->title = "My Yii Application";
?>

<div>
    <h1>Cart</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $cartItem) : ?>
                <?php if ($cartItem->category === "Pizza") { ?>
                    <tr>
                        <td>
                            <?= $cartItem->pizzas->id; ?>
                        </td>
                        <td>
                            <?= $cartItem->pizzas->name; ?>
                        </td>
                        <td>
                            <?= $cartItem->category; ?>
                        </td>
                    </tr>
                <?php } elseif ($cartItem->category === "Side") { ?>
                    <tr>
                        <td>
                            <?= $cartItem->sides->id; ?>
                        </td>
                        <td>
                            <?= $cartItem->sides->name; ?>
                        </td>
                        <td>
                            <?= $cartItem->category; ?>
                        </td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td>
                            <?= $cartItem->toppings->id; ?>
                        </td>
                        <td>
                            <?= $cartItem->toppings->name; ?>
                        </td>
                        <td>
                            <?= $cartItem->category; ?>
                        </td>
                    </tr>
                <?php } ?>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>