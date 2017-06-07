<?php
namespace frontend\controllers;

use backend\models\Card;
use backend\models\CardDeck;
use backend\models\Comment;
use frontend\models\Deck;
use frontend\models\Post;
use yii\web\Controller;
use yii\web\HttpException;

class DeckController extends AppController
{

    public function actionIndex(){
        return $this->render('index');
    }
    public function actionShow($code=false){
        $item = Deck::findOne(['code'=>$code]);
        if(!$item) throw new HttpException(404 ,'Элемент не найден');

        $this->increaseViews('deck',$item->id);

        $cache_key = 'deck_'.$item->id;
        $cache = \Yii::$app->cache->get($cache_key);
        if($cache === false) {
            $sql = "SELECT c.id, c.name, c.class, c.quality, c.cost, c.png, c_d.card_cnt 
                    FROM card AS c 
                    INNER JOIN card_deck AS c_d 
                    ON c.id = c_d.card_id 
                    WHERE c_d.deck_id = {$item->id} 
                    ORDER BY c.cost ASC";
            $cards = CardDeck::findBySql($sql)->asArray()->all();
            $item->cards['general_cnt'] = 0;
            $item->cards['class_cnt_cnt'] = 0;
            foreach ($cards as $card) {
                if ($card['class'] == 'general') {
                    $item->cards['general'][] = $card;
                    $item->cards['general_cnt'] += $card['card_cnt'];
                } else {
                    $item->cards['class'][] = $card;
                    $item->cards['class_cnt'] += $card['card_cnt'];
                }
            }

            \Yii::$app->cache->set($cache_key, $item->cards, \Yii::$app->params['cache']['deck_detail']);

        }else{
            $item->cards = $cache;
        }

        /*
        $ogImage = \Yii::$app->urlManager->createAbsoluteUrl(["/images/".$new->images->imageDetail[0]]);
        $this->view->registerMetaTag(['property'=>'og:title', 'content'=>trim(strip_tags($new->title_ru))]);
        $this->view->registerMetaTag(['property'=>'og:description', 'content'=>trim(strip_tags($new->text_ru))]);
        $this->view->registerMetaTag(['property'=>'og:image', 'content'=>"{$ogImage}"]);
        */


        //TODO: setOg
        $this->setMeta($item->title, "", $item->seo_description);

        $comments = Comment::find()
                            ->where(['element_id'=>$item->id, 'element_type'=>'deck'])
                            ->asArray()
                            ->orderBy(['created_at'=>SORT_DESC])
                            ->indexBy('id')
                            ->all();
        $commentCnt = count($comments);
        if($commentCnt > 0){
            $comments = CommentController::getCommentsTree($comments);
        }
        //sort by parents
        $temp = [];
        foreach ($comments as $comment){
            $temp[$comment['created_at']]=$comment;
        }
        krsort($temp);
        $comments = $temp;
        unset($temp);

        $commentsHTML = CommentController::getCommentsHtml($comments);

        return $this->render("show", ['item'=>$item, 'commentsHTML'=>$commentsHTML, 'commentsCnt'=>$commentCnt]);
    }
}
