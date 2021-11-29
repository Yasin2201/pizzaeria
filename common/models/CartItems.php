<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class CartItems extends ActiveRecord
{
    public function rules()
    {
        return [
            ['cust_id', 'required'],
            ['item_id', 'required'],
            ['category', 'required']
        ];
    }

    public function getPizzas()
    {
        return $this->hasOne(Pizzas::class, ['id' => 'item_id']);
    }

    public function getSides()
    {
        return $this->hasOne(Sides::class, ['id' => 'item_id']);
    }

    public function getToppings()
    {
        return $this->hasOne(Toppings::class, ['id' => 'item_id']);
    }
}
