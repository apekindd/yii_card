<?php if($comment['parent_id'] == 0){ ?>
<li class="media" data-parent="<?= $comment['id'] ?>">
<?php } ?>
    <div class="media-left">
        <div class="avatar">
            <img class="media-object img-rounded" src="" alt="...">
            <div class="social"><span class="letter">B</span></div>
        </div>
    </div>
    <div class="media-body">
        <div class="media-heading">
            <div class="author"><?= $comment['name'] ?></div>
            <div class="metadata">
                <span class="date"><?= \frontend\controllers\AppController::getIndexDate($comment['created_at']) ?></span>
            </div>
        </div>
        <div class="media-text text-justify">
           <?= nl2br($comment['text']) ?>
        </div>
        <div class="footer-comment">
                <span class="vote plus" title="Нравится">
                  <i class="fa fa-thumbs-up"></i>
                </span>
            <span class="rating">
                  +1
                </span>
            <span class="vote minus" title="Не нравится">
                  <i class="fa fa-thumbs-down"></i>
                </span>
            <span class="devide">
                 |
                </span>
            <span class="comment-reply">
                 <a style="cursor:pointer" class="reply" data-id="<?= $comment['id'] ?>">ответить</a>
                </span>
        </div>
        <?php if(isset($comment['childs'])){ ?>
            <?php foreach ($comment['childs'] as $child){?>
            <div class="media" data-parent="<?= $child['id'] ?>">
                <?=self::commentToTemplate($child)?>
            </div>
            <?php } ?>
        <?php } ?>
    </div>
<?php if($comment['parent_id'] == 0){ ?>
</li>
<?php } ?>