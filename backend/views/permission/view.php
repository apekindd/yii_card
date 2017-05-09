<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Permission */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->name], [
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
            'name',
            //'type',
            'description:ntext',
            //'rule_name',
            //'data:ntext',
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

</div>
