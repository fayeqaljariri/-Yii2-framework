<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $city;


    public function rules()
    {
        return [
            ['city', 'required'],

        ];
    }
}
