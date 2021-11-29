<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class CartItems extends ActiveRecord
{
    public function rules()
    {
        return [
            ['cust_id', 'required'],
            ['item_id', 'required'],
        ];
    }
}
