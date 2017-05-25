<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Permission */

$this->title = 'Обновление Доступа: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Доступы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="permission-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
