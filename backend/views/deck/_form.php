<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Deck */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deck-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Навигация -->
    <ul class="nav nav-tabs mynav" role="tablist">
        <li class="active"><a href="#main" role="tab" data-toggle="tab">Main</a></li>
        <li><a href="#preview" role="tab" data-toggle="tab">Preview</a></li>
        <li><a href="#detail" role="tab" data-toggle="tab">Detail</a></li>
    </ul>

    <!-- Содержимое вкладок -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="main">
            <div class="row">
                <div class="col-md-2"><?= $form->field($model, 'active')->dropDownList([1=>"Да",0=>"Нет"]) ?></div>
                <div class="col-md-2"><?= $form->field($model, 'publish')->dropDownList([1=>"Да",0=>"Нет"]) ?></div>
                <div class="col-md-2"><?= $form->field($model, 'dust')->textInput() ?></div>
                <div class="col-md-6"><?= $form->field($model, 'unique')->textInput(['maxlength' => true]) ?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-6"><?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?></div>
            </div>
            <div class="row" style="display:none;">
                <div class="col-md-6">
                    <?= $form->field($model, 'views')->textInput(['value'=>($model->views == '') ? 0 : $model->views]) ?>
                </div>
            </div>
            <?= $form->field($model, 'seo_description')->textInput(['maxlength' => true]) ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="preview">
            <?= \backend\controllers\ImgController::generateImageField('preview_picture', 'post', 1, $model, $form) ?>
            <?= $form->field($model, 'preview_text')->textarea(['maxlength' => true,'rows'=>3]) ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="detail">
            <?= \backend\controllers\ImgController::generateImageField('detail_picture', 'post', 2, $model, $form) ?>
            <?php echo $form->field($model, 'detail_text')->widget(\mihaildev\ckeditor\CKEditor::className(),[
                'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions([
                    'elfinder',
                ],[]),
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
