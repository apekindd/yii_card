<?php

namespace backend\models;

use Yii;

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
class Deck extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deck';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'code'], 'required'],
            [['detail_text', 'images'], 'string'],
            [['active', 'publish', 'dust', 'views'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardDecks()
    {
        return $this->hasMany(CardDeck::className(), ['deck_id' => 'id']);
    }
}
