<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public function rules()
    {
        return [
            ['first_name', 'required'],
            ['first_name', 'string', 'min' => 2, 'max' => 255],

            ['last_name', 'required'],
            ['last_name', 'string', 'min' => 2, 'max' => 255],

            ['contact_num', 'required'],
            ['contact_num', 'number'],
            ['contact_num', 'string', 'min' => 11, 'max' => 11],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],

            ['pizza_id', 'required'],
            ['pizza_id', 'integer'],
        ];
    }

    public function getPizzas()
    {
        return $this->hasOne(Pizzas::class, ['id' => 'pizza_id']);
    }
}
