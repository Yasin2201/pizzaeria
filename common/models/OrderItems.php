<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class OrderItems extends ActiveRecord
{
    public function rules()
    {
        return [
            ['order_ref', 'required'],
            ['item_id', 'required'],
            ['item_category', 'required']
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
