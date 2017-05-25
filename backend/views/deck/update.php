<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Deck */

$this->title = 'Обновление Деки: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Деки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="deck-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
