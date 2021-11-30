<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Sides extends ActiveRecord
{
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'unique', 'targetClass' => '\common\models\Sides', 'message' => 'This side already exists.'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['description', 'required'],
            ['description', 'string', 'min' => 2, 'max' => 255],
        ];
    }
    public function getOrders()
    {
        return $this->hasMany(OrderItems::class, ['item_id' => 'id', 'item_category' => 'category']);
    }
}
