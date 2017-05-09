<?php


namespace backend\controllers;


use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AppController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    public function init()
    {

        $controllers = SettingsController::scanCotrollers();
        if(!empty($controllers['danger'])){
            $cnt=count($controllers['danger']);
            $html = "Обнаружены критические ошибки, которые влияют на безопасность приложениея. Пройдите по <a href='".Url::to(['/settings','#'=>'dev'])."'>ссылке</a>, чтобы получить инструкции по их устранению. Количество ошибок  - <b>{$cnt}</b>";
            \Yii::$app->session->setFlash('danger',$html);
        }


        $res = $this->behaviors();
        if(!isset($res['access'])){
            echo "Для контроллера <b>".self::className()."</b> в поведении не прописант access, добавьте правила доступа, либо удалите его совсем, чтобы поведение унаследовалось от <b>AppController</b>.";
            exit;
        }
        parent::init(); // Call parent implementation;
    }
}