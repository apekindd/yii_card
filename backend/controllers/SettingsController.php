<?php


namespace backend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Url;

class SettingsController extends AppController
{
    public function actionIndex(){
        $arScan = $this->scanCotrollers();

        return $this->render('index',['arScan'=>$arScan]);
    }

    public function actionClear(){
        if(Yii::$app->request->isPost){
            Yii::$app->cacheFrontend->flush();
            Yii::$app->session->setFlash('success', 'Весь кеш успешно удалён.');
            return Yii::$app->getResponse()->redirect(Url::to(['/settings']));
        }
    }

    public static function scanCotrollers(){
        $arResult['danger'] = [];
        $arResult['warning'] = [];
        $arResult['normal'] = [];
        $files = FileHelper::findFiles(__DIR__, [
            'only' => [
                '*.php'
            ]
        ]);
        foreach($files as $file){
            $className = str_replace([__DIR__."\\",'.php'],'',$file);

            $temp=explode('/',$className);
            $className=$temp[count($temp)-1];

            if($className == 'AppController'){
                continue;
            }
            $content = file_get_contents($file);
            preg_match('/extends([^&]*)\n{/', $content, $m);
            $m[1]=trim($m[1]);


            if($m[1] == 'Controller'){
                $arResult['danger'][$className]['name'] = $className;
                $arResult['danger'][$className]['extends'] = $m[1];
            }elseif($m[1] == 'AppController'){
                $arResult['normal'][$className]['name'] = $className;
                $arResult['normal'][$className]['extends'] = $m[1];
            }else{
                $arResult['warning'][$className]['name'] = $className;
                $arResult['warning'][$className]['extends'] = $m[1];
            }

        }
        return $arResult;
    }
}