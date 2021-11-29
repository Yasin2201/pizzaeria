<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Toppings extends ActiveRecord
{
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'unique', 'targetClass' => '\common\models\Toppings', 'message' => 'This topping already exists.'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['description', 'required'],
            ['description', 'string', 'min' => 2, 'max' => 255],
        ];
    }
}
