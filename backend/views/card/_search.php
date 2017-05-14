<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'class') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'pack') ?>

    <?php // echo $form->field($model, 'quality') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'attack') ?>

    <?php // echo $form->field($model, 'health') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'history') ?>

    <?php // echo $form->field($model, 'png') ?>

    <?php // echo $form->field($model, 'gif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
