<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            //'status',
            [
                'attribute' => 'created_ad',
                'value' => date('d.m.Y',$model->created_at)
            ],
            [
                'attribute' => 'updated_at',
                'value' => date('d.m.Y',$model->updated_at)
            ],
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

    <?php
    echo "Роли:<br/>";
    foreach ($model->roles as $role){
        if($role['checked'] === 1){
            echo "<p><b>".$role['role']."</b></p>";
        }
    }
    ?>

</div>
