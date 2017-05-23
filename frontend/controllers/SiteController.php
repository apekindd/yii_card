<?php
namespace frontend\controllers;

use frontend\models\Post;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $items = Post::findBySql('
                                      SELECT title, views, code, created_at, images, preview_text,type 
                                      FROM post 
                                      WHERE active=1 AND publish=1 
                                      UNION 
                                      SELECT title, views, code, created_at, images, preview_text, type 
                                      FROM deck 
                                      WHERE active=1 AND publish=1 
                                      ORDER BY created_at DESC LIMIT 10 OFFSET 0
                                 ')->all();
        return $this->render('index',[
            'items'=>$items
        ]);
    }


}
