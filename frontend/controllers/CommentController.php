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
            $parent_id = (int)$post['parent_id'];
            if($parent_id > 0){
                if(!Comment::find()->where(['id'=>$parent_id])->exists()){
                    return "err7";
                }
            }

            $comment = new Comment();
            $comment->user_id = Yii::$app->user->id;
            $comment->element_id = $id;
            $comment->parent_id = $parent_id;
            $comment->element_type = $post['type'];
            $comment->text = $post['text'];

            if($comment->save()){
                Yii::$app->session->setFlash('commentAdded','Ваш комментарий успешно добавлен');
                return 'success';
            }else{
                return 'err8';
            }

        }else{
            Yii::$app->response->redirect(Url::to(['site/index']));
        }
        /**
         * err1 - incorrect user_id
         * err2 - empty text
         * err3 - incorrect type
         * err4 - wrong input id
         * err5 - Post item not exists
         * err6 - Deck item not exists
         * err7 - Parent not exists
         * err8 - Cant add to db
         */
    }


    public static function getCommentsTree($array){
        $tree = [];
        foreach($array as $id=>&$node) {
            if($node['parent_id'] == 0){
                $tree[$id]= &$node;
            }else{
                $array[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    public static function getCommentsHtml($tree){
        $str = '';
        foreach ($tree as $comment) {
            $str .= self::commentToTemplate($comment);
        }
        return $str;
    }

    public static function commentToTemplate($comment){
        ob_start();
        include(Yii::getAlias("@frontend") . '/views/comment/comment-tree.php');
        return ob_get_clean();
    }
}
?>
