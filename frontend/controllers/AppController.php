<?php


namespace frontend\controllers;


use yii\web\Controller;
use Yii;

class AppController extends Controller
{

    public static $arMonth = [
        '01' => "января",
        '02' => "февраля",
        '03' => "марта",
        '04' => "апреля",
        '05' => "мая",
        '06' => "июня",
        '07' => "июля",
        '08' => "августа",
        '09' => "сентября",
        '10' => "октября",
        '11' => "ноября",
        '12' => "декабря"
    ];

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

    public static function getIndexDate($time){
        return date('j',$time).' '.self::$arMonth[date('m',$time)].' '.date('Y',$time);
    }
}