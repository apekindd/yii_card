<?php

namespace frontend\models;

use Yii;

class Deck extends \yii\db\ActiveRecord
{
    public $cards;

    public static function tableName()
    {
        return 'deck';
    }

    public function afterFind()
    {
        $this->images = json_decode($this->images);
        parent::afterFind();
    }
}
