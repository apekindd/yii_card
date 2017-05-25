<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Навигация -->
    <ul class="nav nav-tabs mynav" role="tablist">
        <li class="active"><a href="#main" role="tab" data-toggle="tab">Основное</a></li>
        <li><a href="#preview" role="tab" data-toggle="tab">Превью</a></li>
        <li><a href="#detail" role="tab" data-toggle="tab">Детальная</a></li>
    </ul>

    <!-- Содержимое вкладок -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="main">
            <div class="row">
                <div class="col-md-2"><?= $form->field($model, 'active')->dropDownList([1=>"Да",0=>"Нет"]) ?></div>
                <div class="col-md-2"><?= $form->field($model, 'publish')->dropDownList([1=>"Да",0=>"Нет"]) ?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-6"><?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?></div>
            </div>
            <div class="row" style="display:none;">
                <div class="col-md-6">
                    <?= $form->field($model, 'views')->textInput(['value'=>($model->views == '') ? 0 : $model->views]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'user_id')->textInput(['value'=>($model->user_id == '') ? Yii::$app->user->id : $model->user_id]) ?>
                </div>
            </div>
            <?= $form->field($model, 'seo_description')->textInput(['maxlength' => true]) ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="preview">
            <div class="row">
                <div class="col-md-6"> <?= \backend\controllers\ImgController::generateImageField('preview_picture', 'post', 1, $model, $form) ?></div>
                <div class="col-md-6">
                    <?php if($model->images->preview_picture){ ?>
                        <div style='display: inline-grid;margin-left: 20px;border:2px solid #000; padding:5px;margin-top:5px;margin-bottom:5px'>
                            <img id='preview_crop' style='display: inline-grid;'/><br/>
                            <input type='hidden' name="p_crop" value="" />
                            <button type="button" class="btn btn-default crop-preview-modal" data-toggle="modal" data-target="#previewModal">Обрезать</button>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <?= $form->field($model, 'preview_text')->textarea(['maxlength' => true,'rows'=>3]) ?>



        </div>
        <div role="tabpanel" class="tab-pane" id="detail">


            <div class="row">
                <div class="col-md-6">
                    <?= \backend\controllers\ImgController::generateImageField('detail_picture', 'post', 2, $model, $form) ?>
                </div>
                <div class="col-md-6">
                    <?php if($model->images->detail_picture){ ?>
                    <div style='display: inline-grid;margin-left: 20px;border:2px solid #000; padding:5px;margin-top:5px;margin-bottom:5px'>
                        <img id='detail_crop' style='display: inline-grid;max-width: 100%'/><br/>
                        <input type='hidden' name="d_crop" value="" />
                        <button type="button" class="btn btn-default crop-detail-modal" data-toggle="modal" data-target="#detailModal">Обрезать</button>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <?php echo $form->field($model, 'detail_text')->widget(\mihaildev\ckeditor\CKEditor::className(),[
                'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions([
                    'elfinder',
                ],[]),
            ]); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" role="dialog">
    <div class="modal-dialog modal-lg" style="overflow: scroll;width: 80%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Выделите нужную область</h4>
            </div>
            <div class="modal-body">
                <canvas id="panel_preview" width="200" height="200"></canvas>
                <div id="results_preview" style="display: none;">
                    <img id="crop_result_preview" />
                </div>
            </div>
            <div class="modal-footer">
                <div class="contr">
                    <!--<button type="button" onclick="getPreviewResults()" class="btn btn">Обрезать</button>-->
                    <button type="button" onclick="getPreviewResults()" class="btn btn-success crop-preview-add" data-dismiss="modal">Добавить</button>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="detailModal" role="dialog">
    <div class="modal-dialog modal-lg" style="overflow: scroll;width: 80%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Выделите нужную область</h4>
            </div>
            <div class="modal-body">
                <canvas id="panel_detail" width="200" height="200"></canvas>
                <div id="results_detail" style="display: none;">
                    <img id="crop_result_detail" />
                </div>
            </div>
            <div class="modal-footer">
                <div class="contr">
                    <!--<button type="button" onclick="getDetailResults()" class="btn btn">Обрезать</button>-->
                    <button type="button" onclick="getDetailResults()" class="btn btn-success crop-detail-add" data-dismiss="modal">Добавить</button>
                </div>
            </div>
        </div>

    </div>
</div>
