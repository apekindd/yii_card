<?php
namespace backend\controllers;

use backend\models\Img;
use Yii;
use backend\models\News;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MainController implements the CRUD actions for MainCheck model.
 */
class ImgController extends AppController
{

    public function saveFromBase64($b64string){
        preg_match('/data:image.(.*?);base64,/',$b64string, $extension);
        $b64image = preg_replace('/data:.*?base64,/', '', $b64string);
        $b64image = str_replace(' ', '+', $b64image);
        $name = Img::generateName().'.'.$extension[1];
        $result = file_put_contents(Yii::getAlias("@frontend") .'/web/images/'.$name, base64_decode($b64image));
        if($result){
            return $name;
        }else{
            return false;
        }
    }

    public function actionCreate($model,$one)
    {
        if($one){
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $model->uploadOneImg();
            }
        }else{
            $model->imageFile = UploadedFile::getInstances($model, 'imageFile');
            if ($model->imageFile) {
                $model->uploadSeveral();
            }
        }

        return $this->redirect(['view', 'id' => $model->id]);
    }
    
    public function actionUpdate($id,$one)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($one){
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if ($model->imageFile) {
                    $model->uploadOneImg();
                }
            }else{
                $model->imageFile = UploadedFile::getInstances($model, 'imageFile');
                if ($model->imageFile) {
                    $model->uploadSeveral();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelimg($model,$id)
    {
        $image = $model->getImage();
        $model->removeImage($image);
        return $this->redirect(['update', 'id' => $model->id]);
    }

    public function actionDelimgseveral($model,$c)
    {
        $images = $model->getImages();
        $model->removeImage($images[$c]);
        return $this->redirect(['update', 'id' => $model->id]);
    }

    public static function generateImageField( $field, $modelName, $arrModelId, $model, $form ){
        $html = "<div style='border:2px solid #000; padding:5px;margin-top:5px;margin-bottom:5px'>";
         if(!empty($model->images->$field)) {
             $html .= "<img src='/images/{$model->images->$field}' alt='' style='max-width: 100%'><br>";
             $html .= "<a href='" . Url::to(["{$modelName}/delimage", 'img' => base64_encode(implode("|", [$model->images->$field, $model->id, $arrModelId]))]) . "'>Удалить</a>";
         }else{
             $html .= $form->field($model, $field)->fileInput();
         }
        $html .= "</div>";
        return $html;
    }

    public static function generateMultiImagesFields( $field, $modelName,$arrModelId, $model, $form ){
        $html = "<div style='border:2px solid #000; padding:5px;margin-top:5px;margin-bottom:5px'>";
        $html .= $form->field($model, "{$field}[]")->fileInput(['multiple' => true, 'accept' => 'image/*']);

         if(!empty($model->images->$field)):
             $html .= "<table>";
                foreach ($model->images->$field as $item):
                    $html .= " <tr style='display: inline;'>";
                        $html .= "<td style='padding: 10px'>";
                           $html .=  "<img src='/images/{$item}' alt='' style='max-width: 200px; max-height: 200px'>";
                            $html .= "<br>";
                    $html .= "<a href='".Url::to(["{$modelName}/delimage", 'img'=> base64_encode( implode("|",[$item,$model->id,$arrModelId]) )])."'>Удалить</a>";

                         $html .= "</td>";
                    $html .= "</tr>";
                endforeach;
             $html .= "</table>";
        endif;
        $html .= "</div>";
        return $html;
    }

}