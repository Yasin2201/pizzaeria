<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Pizzas extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
        ];
    }
}