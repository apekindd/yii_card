<?php
namespace frontend\controllers;

use backend\models\Comment;
use frontend\models\Post;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * Site controller
 */
class PostController extends AppController
{

    public function actionIndex(){
        return $this->render('index');
    }
    public function actionShow($code=false){
        $item = Post::findOne(['code'=>$code]);
        if(!$item) throw new HttpException(404 ,'Элемент не найден');

        /*
        $ogImage = \Yii::$app->urlManager->createAbsoluteUrl(["/images/".$new->images->imageDetail[0]]);
        $this->view->registerMetaTag(['property'=>'og:title', 'content'=>trim(strip_tags($new->title_ru))]);
        $this->view->registerMetaTag(['property'=>'og:description', 'content'=>trim(strip_tags($new->text_ru))]);
        $this->view->registerMetaTag(['property'=>'og:image', 'content'=>"{$ogImage}"]);
        */

        $this->setMeta($item->title, "", $item->seo_description);

        $comments = Comment::find()
                            ->where(['element_id'=>$item->id, 'element_type'=>'post'])
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
