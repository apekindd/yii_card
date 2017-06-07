<?php


namespace frontend\controllers;


use frontend\models\Post;
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

    protected function setOg($title, $desc, $img){
        $this->view->registerMetaTag(['property'=>'og:title', 'content'=>"{$title}"]);
        $this->view->registerMetaTag(['property'=>'og:description', 'content'=>"{$desc}"]);
        $this->view->registerMetaTag(['property'=>'og:image', 'content'=>"{$img}"]);
    }

    public static function getIndexDate($time){
        return date('j',$time).' '.self::$arMonth[date('m',$time)].' '.date('Y',$time);
    }

    protected function increaseViews($table, $id){
        $sql = "UPDATE {$table} SET views = views + 1 WHERE id={$id}";
        Yii::$app->db->createCommand($sql)->execute();
        /*$result = Yii::$app->db->createCommand("SELECT views FROM {$table} WHERE id={$id}")->queryOne();
        return $result['views'];*/
    }
}