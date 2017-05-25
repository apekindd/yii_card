<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Role */

$this->title = 'Обновление Роли: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Роли', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="role-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
