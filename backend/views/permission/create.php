<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Permission */

$this->title = 'Создание Доступа';
$this->params['breadcrumbs'][] = ['label' => 'Доступы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
