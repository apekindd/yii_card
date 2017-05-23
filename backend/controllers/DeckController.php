<?php

namespace backend\controllers;

use Yii;
use backend\models\Deck;
use backend\models\search\DeckSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DeckController implements the CRUD actions for Deck model.
 */
class DeckController extends AppController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Deck models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DeckSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Deck model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Deck model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Deck();

        if ($model->load(Yii::$app->request->post())) {

            //CHECK CODE
            $model->code = $this->str2url($model->code);
            if($model->code != '') {
                if (Deck::findOne(['code' => $model->code]) !== NULL) {
                    Yii::$app->session->setFlash('error', "Элемент с символьным кодом {$model->code} уже существует");
                    if ($model->imageFile) {
                        $model->uploadSeveral();
                    }
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }

            $model->detail_picture = UploadedFile::getInstance($model, 'detail_picture');
            $model->preview_picture = UploadedFile::getInstance($model, 'preview_picture');

            if($model->save()) {
                Yii::$app->session->setFlash('success', "Элемент успешно создан");
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Deck model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            //CHECK CODE
            if($model->code != '') {
                if ($model->oldAttributes['code'] != $model->code) {
                    $model->code = $this->str2url($model->code);
                    if (Deck::findOne(['code' => $model->code]) !== NULL) {
                        Yii::$app->session->setFlash('error', "Элемент с символьным кодом {$model->code} уже существует");
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                }
            }

            $model->detail_picture = UploadedFile::getInstance($model, 'detail_picture');
            $model->preview_picture = UploadedFile::getInstance($model, 'preview_picture');

            if($model->save()) {
                Yii::$app->session->setFlash('success', "Элемент успешно обновлен");
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Deck model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Deck model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Deck the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Deck::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDelimage($img)
    {
        $arr = explode("|", base64_decode($img));
        $path = Yii::getAlias("@frontend") .'/web/images/' . $arr[0];
        @unlink($path);

        $model = $this->findModel($arr[1]);
        if($arr[2]==1) $model->images->preview_picture = "";
        if($arr[2]==2) $model->images->detail_picture = "";

        $model->save();
        return $this->redirect(['update', 'id' => $model->id]);
    }
}
