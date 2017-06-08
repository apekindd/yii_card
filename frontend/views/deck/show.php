<div class="container main main-detail detail_deck">
    <div class="container">
        <div class="row white-bg">
            <div class="col-xs-12 col-md-8">
                <h1 class="decks-title"><?= $item->title ?></h1>
                <div class="thumbnail deck-img">
                    <img src="/images/<?= $item->images->detail_picture ?>" />
                </div>
                <div id="deck-master" class="card-list row">
                    <?php if($item->cards['class_cnt'] > 0){ ?>
                    <div class="col-md-6 deck-list">
                        <div class="deck-header">
                            <div class="dk-name">
                                <strong>Классовые (<?= $item->cards['class_cnt'] ?>)</strong>
                            </div>
                        </div>
                        <ul class="deck-class">
                            <?php foreach($item->cards['class'] as $card){?>
                            <li class="focus card-frame rare-<?= $card['quality'] ?> " data-view="<?= $card['id'] ?>">
                                <span class="card-cost"><?= $card['cost'] ?></span>
                                <span class="card-name"><?= $card['name'] ?></span>
                                <span class="card-count"><span class="small-x">&times;</span><?= $card['card_cnt'] ?></span>
                                <span class="card-image card-count-ex">
                                    <p class="blur-card-left"></p>
                                    <p class="blur-card-right"></p>
                                    <img src="/data/preview/<?=$card['png'] ?>">
                                </span>
                            </li>
                                <div class="card-view" id="view-<?= $card['id'] ?>"><img <?=(strpos($card['png'], 'KAR') !== false) ? "style='width:220px'" : ""?> src="/data/cards/<?=$card['png'] ?>" /></div>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php if($item->cards['general_cnt'] > 0){ ?>
                    <div class="col-md-6 deck-list">
                        <div class="deck-header">
                            <div class="dk-name">
                                <strong>Общие (<?= $item->cards['general_cnt'] ?>)</strong>
                            </div>
                        </div>
                        <ul class="deck-class neutral-cards">
                            <?php foreach($item->cards['general'] as $card){?>
                                <li class="focus card-frame rare-<?= $card['quality'] ?> " data-view="<?= $card['id'] ?>">
                                    <span class="card-cost"><?= $card['cost'] ?></span>
                                    <span class="card-name"><?= $card['name'] ?></span>
                                    <span class="card-count"><span class="small-x">&times;</span><?= $card['card_cnt'] ?></span>
                                    <span class="card-image card-count-ex">
                                    <p class="blur-card-left"></p>
                                    <p class="blur-card-right"></p>
                                    <img src="/data/preview/<?=$card['png'] ?>">
                                </span>
                                </li>
                                <div class="card-view" id="view-<?= $card['id'] ?>"><img <?=(strpos($card['png'], 'KAR') !== false) ? "style='width:220px'" : ""?> src="/data/cards/<?=$card['png'] ?>" /></div>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>

                <div class="container detail_content col-xs-12">
                    <?= $item->detail_text ?>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?= $this->render('/comment/comment-items', ['item'=>$item,'commentsHTML'=>$commentsHTML, 'commentsCnt'=>$commentsCnt]); ?>
</div>