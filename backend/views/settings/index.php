<!-- Навигация -->
<ul class="nav nav-tabs" role="tablist" style="margin-bottom:30px">
    <li class="active"><a href="#main" aria-controls="posts" role="tab" data-toggle="tab">Основное</a></li>
</ul>
<!-- Содержимое вкладок -->
<div class="tab-content">

    <div role="tabpanel" class="tab-pane active" id="main">
        <form method="POST" action="/admin/settings/clear">
            <button class="btn btn-danger" type="submit">Удалить кеш</button>
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        </form>
    </div>
</div>
