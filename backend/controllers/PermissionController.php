<?php

namespace backend\controllers;

use Yii;
use backend\models\Permission;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\rbac\Item;

/**
 * PermissionController implements the CRUD actions for Permission model.
 */
class PermissionController extends AppController
{

    /**
     * Lists all Permission models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Permission::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andWhere(['=','type',Item::TYPE_PERMISSION]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Permission model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Permission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Permission();

        if ($model->load(Yii::$app->request->post())) {
            $model->type = Item::TYPE_PERMISSION;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->name]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Permission model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->type = Item::TYPE_PERMISSION;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->name]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Permission model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Permission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Permission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Permission::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
