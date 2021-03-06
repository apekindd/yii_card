<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Карты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'name_en',
            'class',
            'type',
            // 'pack',
            // 'quality',
            // 'cost',
            // 'attack',
            // 'health',
            // 'description',
            // 'history',
            // 'png',
            // 'gif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
