<?php
namespace frontend\controllers;

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


            //echo '<pre>';print_r(Yii::$app->user->id); echo '</pre>';

        }else{
            Yii::$app->response->redirect(Url::to(['site/index']));
        }
    }
}
