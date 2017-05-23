<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DeckSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Decks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deck-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Deck', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'title',
                'value'=>function($model){
                    return "<a href='".\yii\helpers\Url::to(['/deck/update','id'=>$model->id])."'>".$model->title."</a>";
                },
                'format'=>'html'
            ],
            'code',
            'id',
            //'preview_text',
            //'detail_text:ntext',
            // 'images:ntext',
            // 'active',
            // 'date_create',
            // 'date_update',
            // 'seo_description',
            // 'unique',
            // 'dust',
            // 'views',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{delete}{page}',
                'buttons'=>[
                    'page' => function ($url, $model) {
                        if($model->code != ''){
                            $link = "/deck/".$model->code;
                            return Html::a('<span class="glyphicon glyphicon-globe"></span>', $link, [
                                'title' => Yii::t('yii', 'Show page'),
                            ]);
                        }
                    },
                ]
            ],
        ],
    ]); ?>
</div>
