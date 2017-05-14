<?php
namespace frontend\controllers;

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
        $post = Post::findOne(['code'=>$code]);
        if(!$post) throw new HttpException(404 ,'Элемент не найден');

        /*
        $ogImage = \Yii::$app->urlManager->createAbsoluteUrl(["/images/".$new->images->imageDetail[0]]);
        $this->view->registerMetaTag(['property'=>'og:title', 'content'=>trim(strip_tags($new->title_ru))]);
        $this->view->registerMetaTag(['property'=>'og:description', 'content'=>trim(strip_tags($new->text_ru))]);
        $this->view->registerMetaTag(['property'=>'og:image', 'content'=>"{$ogImage}"]);
        */

        $this->setMeta($post->title, "", $post->seo_description);

        return $this->render("show", ['post'=>$post]);
    }
}
