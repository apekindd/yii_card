<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property integer $id
 * @property string $name
 * @property string $name_en
 * @property string $class
 * @property string $type
 * @property string $pack
 * @property string $quality
 * @property integer $cost
 * @property integer $attack
 * @property integer $health
 * @property string $description
 * @property string $history
 * @property string $png
 * @property string $gif
 *
 * @property CardDeck[] $cardDecks
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cost', 'attack', 'health'], 'integer'],
            [['name', 'name_en', 'class', 'type', 'pack', 'quality', 'description', 'history'], 'string', 'max' => 255],
            [['png', 'gif'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'name_en' => 'Название EN',
            'class' => 'Класс',
            'type' => 'Тип',
            'pack' => 'Набор',
            'quality' => 'Качество',
            'cost' => 'Стоимость',
            'attack' => 'Атака',
            'health' => 'Здоровье',
            'description' => 'Описание',
            'history' => 'История',
            'png' => 'Png',
            'gif' => 'Gif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardDecks()
    {
        return $this->hasMany(CardDeck::className(), ['card_id' => 'id']);
    }
}
