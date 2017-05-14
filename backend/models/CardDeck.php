<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "card_deck".
 *
 * @property integer $id
 * @property integer $card_id
 * @property integer $deck_id
 * @property integer $card_cnt
 *
 * @property Deck $deck
 * @property Card $card
 */
class CardDeck extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card_deck';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['card_id', 'deck_id'], 'required'],
            [['card_id', 'deck_id', 'card_cnt'], 'integer'],
            [['deck_id'], 'exist', 'skipOnError' => true, 'targetClass' => Deck::className(), 'targetAttribute' => ['deck_id' => 'id']],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => Card::className(), 'targetAttribute' => ['card_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'card_id' => 'Card ID',
            'deck_id' => 'Deck ID',
            'card_cnt' => 'Card Cnt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeck()
    {
        return $this->hasOne(Deck::className(), ['id' => 'deck_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(Card::className(), ['id' => 'card_id']);
    }
}
