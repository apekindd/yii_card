<?php

namespace frontend\models;

use Yii;

class Post extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'post';
    }

    public function afterFind()
    {
        $this->images = json_decode($this->images);
        parent::afterFind();
    }
}
