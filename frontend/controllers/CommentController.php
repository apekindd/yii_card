<?php
namespace frontend\controllers;

use backend\models\Comment;
use backend\models\Deck;
use frontend\models\Post;
use yii\helpers\Url;
use yii\web\HttpException;
use Yii;

class CommentController extends AppController
{
    public function actionAdd(){
        if(Yii::$app->request->isAjax){
            if(!Yii::$app->user->id){
                return "err1";
            }
            $post = Yii::$app->request->post();
            $post['text'] = trim(strip_tags($post['text']));
            if($post['text'] == ''){
                return "err2";
            }
            if($post['type']!='post' && $post['type']!='deck'){
                return "err3";
            }
            $id = (int)$post['id'];
            if($id == 0){
                return "err4";
            }
            if($post['type']=='post'){
                if(!Post::find()->where(['id'=>$id])->exists()){
                    return "err5";
                }
            }else if($post['type']=='deck'){
                if(!Deck::find()->where(['id'=>$id])->exists()){
                    return "err6";
                }
            }

            $comment = new Comment();
            $comment->user_id = Yii::$app->user->id;


            //echo '<pre>';print_r(Yii::$app->user->id); echo '</pre>';

        }else{
            Yii::$app->response->redirect(Url::to(['site/index']));
        }
        /**
         * err1 - incorrect user_id
         * err2 - empty text
         * err3 - incorrect type
         * err4 - wrong input id
         * err5 - Post itemnot exists
         * err6 - Deck itemnot exists
         */
    }
}
?>
