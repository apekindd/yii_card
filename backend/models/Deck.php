<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "deck".
 *
 * @property integer $id
 * @property string $title
 * @property string $code
 * @property string $preview_text
 * @property string $detail_text
 * @property string $images
 * @property integer $active
 * @property string $date_create
 * @property string $date_update
 * @property string $seo_description
 * @property string $unique
 * @property integer $dust
 * @property integer $views
 *
 * @property CardDeck[] $cardDecks
 */
class Deck extends Img
{

    public $preview_picture;
    public $detail_picture;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deck';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['preview_picture','detail_picture'], 'file', 'extensions' => 'png, jpg'],

            [['title', 'code'], 'required'],
            [['detail_text'], 'string'],
            [['active', 'publish', 'dust', 'views'], 'integer'],
            [['title', 'code', 'preview_text', 'seo_description'], 'string', 'max' => 255],
            [['unique'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'code' => 'Code',
            'preview_text' => 'Preview Text',
            'detail_text' => 'Detail Text',
            'images' => 'Images',
            'active' => 'Active',
            'publish' => 'Publish',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'seo_description' => 'Seo Description',
            'unique' => 'Unique',
            'dust' => 'Dust',
            'views' => 'Views',
            'preview_picture' => 'preview_picture',
            'detail_picture' => 'detail_picture',
        ];
    }

    public function beforeSave($insert)
    {
        if($this->images==null){
            $this->images = [
                "preview_picture"=>"",
                "detail_picture"=>""
            ];
            $this->images = json_encode($this->images);
            $this->images = json_decode($this->images);
        }

        if($this->preview_picture){
            $name =  $this->generateName() . '.' . $this->preview_picture->extension;
            $this->preview_picture->saveAs(Yii::getAlias("@frontend").'/web/images/' .$name);
            $this->images->preview_picture = $name;
        }
        if($this->detail_picture){
            $name =  $this->generateName() . '.' . $this->detail_picture->extension;
            $this->detail_picture->saveAs(Yii::getAlias("@frontend").'/web/images/' .$name);
            $this->images->detail_picture = $name;
        }


        $this->images = json_encode($this->images);


        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function afterFind()
    {
        $this->images = json_decode($this->images);

        parent::afterFind(); // TODO: Change the autogenerated stub
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardDecks()
    {
        return $this->hasMany(CardDeck::className(), ['deck_id' => 'id']);
    }
}
