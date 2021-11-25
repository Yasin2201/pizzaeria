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
            ['contact_num', 'integer'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],

            ['pizza_id', 'required'],
            ['pizza_id', 'integer'],
        ];
    }
}