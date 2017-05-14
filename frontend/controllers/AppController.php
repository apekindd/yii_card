<?php


namespace frontend\controllers;


use yii\web\Controller;
use Yii;

class AppController extends Controller
{
    /**
     * Set meta-data
     * @param null $title
     * @param null $keywords
     * @param null $description
     */
    protected function setMeta( $title=null, $keywords=null, $description=null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name'=>'keywords', 'content'=>"$keywords"]);
        $this->view->registerMetaTag(['name'=>'description', 'content'=>"$description"]);
    }
}