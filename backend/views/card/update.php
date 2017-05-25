<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Card */

$this->title = 'Обновление Карты: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Карты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="card-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
