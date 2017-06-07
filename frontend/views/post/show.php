<div class="container main main-detail">
    <div class="row top_image">
        <div class="col-xs-12">
            <div class="thumbnail detail_thumb">
                <img class="detail-picture" src="/images/<?= $item->images->detail_picture ?>">
            </div>
            <div class="detail-post-title">
                <header class="detail_header">
                    <h1 class="entry-title"><?= $item->title ?></h1>
                    <p class="preview_text"><?= $item->preview_text ?></p>
                    <div class="block_footer ">
                        <time itemprop="dateCreated" class="entry-date updated td-module-date" datetime="<?= date("Y-m-d\TH:i:s",$item->created_at) ?>"><?= \frontend\controllers\AppController::getIndexDate($item->created_at) ?></time> / <?= $item->views ?> просмотров
                    </div>

                </header>
            </div>
        </div>
    </div>
    <div class="row white-bg">
        <div class="col-xs-12 col-md-8">
            <div class="container detail_content col-xs-12" >
                <?= $item->detail_text ?>
            </div>
        </div>
        <div class="col-md-4"></div>
        <?= $this->render('/comment/comment-items', ['item'=>$item,'commentsHTML'=>$commentsHTML, 'commentsCnt'=>$commentsCnt]); ?>
    </div>
</div>
