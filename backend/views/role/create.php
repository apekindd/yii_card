<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Role */

$this->title = 'Создать Роль';
$this->params['breadcrumbs'][] = ['label' => 'Роли', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
