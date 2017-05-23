<?php

/* @var $this yii\web\View */

$this->title = 'Все о Hearhstone, топ колоды, новости | Cardstone';

?>
<div class="container main index_page main-detail">
    <div class="row top-bg hidden-xs"><div class="small-bg" style="background-image: url('/img/bg2.png');"></div></div>
    <div class="row">
        <div class="container_title top_container museo_title">НОВОЕ</div>
        <div class="container container_main">
            <?php foreach($items as $item){?>
            <div class="col-xs-12 col-sm-12 col-md-8 no-padding">
                <div class="row main_item">
                    <div class="thumbnail col-xs-12 col-md-4  col-sm-4">
                        <a href="<?= \yii\helpers\Url::to([$item->type.'/show', 'code'=>$item->code]) ?>">
                            <img src="/images/<?=($item->images->preview_picture != '') ? $item->images->preview_picture : "no_preview.png"?>" alt="<?= $item->title ?>" />
                        </a>
                    </div>
                    <div class="caption index-post-title col-md-8  col-sm-8">
                        <header class="detail_header_index">
                            <h3 class="preview_title museo_title entry-title"><a href="<?= \yii\helpers\Url::to([$item->type.'/show', 'code'=>$item->code]) ?>"><?= $item->title ?></a></h3>
                            <p class="preview_text"><?= $item->preview_text ?></p>
                            <footer class="block_footer on_main">
                                <time itemprop="dateCreated" datetime="<?= date("Y-m-d\TH:i:s",$item->created_at) ?>"><?= \frontend\controllers\AppController::getIndexDate($item->created_at) ?></time> / <?= $item->views ?> просмотров
                            </footer>
                        </header>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
