<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Deck */

$this->title = 'Создание Деки';
$this->params['breadcrumbs'][] = ['label' => 'Деки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deck-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
