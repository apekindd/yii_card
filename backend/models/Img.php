<?php
namespace backend\models;

use Yii;

class Img extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $rule = [['imageFile'], 'file', 'extensions' => 'png, jpg, mp4'];
    //public $ruleSeveral = [['imageFile'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 10];

    public function ruleGetSeveral($count)
    {
        return [['imageFile'], 'file', 'extensions' => 'png, jpg, mp4', 'maxFiles' => $count];
    }

    public function uploadOneImg()
    {
        if ($this->validate()) {
            $path = Yii::getAlias("@frontend").'/web/images/store/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }

    public function uploadSeveral()
    {
        if ($this->validate()) {
            foreach ($this->imageFile as $file) {
                $path = Yii::getAlias("@frontend").'/web/images/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }
    protected function generateName(){
        $arr=['a','b','c','d','e','f','g','h','k','l','m','n','i','x','y','z'];
        
        return $arr[rand(0,count($arr)-1)].
        $arr[rand(0,count($arr)-1)].
        $arr[rand(0,count($arr)-1)].
        $arr[rand(0,count($arr)-1)].
        $arr[rand(0,count($arr)-1)].rand(0,10).
        $arr[rand(0,count($arr)-1)].rand(0,10).
        $arr[rand(0,count($arr)-1)].rand(0,10).
        $arr[rand(0,count($arr)-1)].rand(0,10).
        $arr[rand(0,count($arr)-1)].rand(0,10).
        $arr[rand(0,count($arr)-1)].rand(0,10);
    }
    
}