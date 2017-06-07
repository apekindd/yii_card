<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="comments"  id="comments">
            <h3 class="title-comments">Комментарии (<?= $commentsCnt ?>)</h3>
            <?php
            if(Yii::$app->session->getFlash('commentAdded')){
                echo "<div class='commentAdded'>".Yii::$app->session->getFlash('commentAdded')."</div>";
            }
            ?>
            <input type="hidden" name="id" value="<?= $item->id ?>" />
            <input type="hidden" name="type" value="<?= $item->type ?>" />
            <div class="row comment-form">
                <?php if(Yii::$app->user->getId() > 0){?>
                    <div class="avatar">
                        <img src="" width="50" height="50" />
                        <div class="social"><span class="letter"><i class="fa fa-facebook" aria-hidden="true"></i></span></div>
                        <!--<div class="social"><span class="letter"><i class="fa fa-vk" aria-hidden="true"></i></span></div>-->
                    </div>
                    <form class="comments-form">
                        <p class="text">
                            <textarea  name="text"></textarea>
                        </p>
                        <input type="hidden" name="parent_id" value="0" />
                        <p class="submit">
                            <input  type="button" class="comment" value="Комментировать" />
                        </p>
                    </form>
                <?php } else{ ?>
                    <p class="soc-text">Авторизируйтесь чтобы оставять комментарии:

                        <span class="fa-stack" style="cursor:pointer">
                                <i class="fa fa-circle fa-stack-2x" style="color:#151a23"></i>
                                <i class="fa fa-facebook fa-stack-1x" style="color:#fff"></i>
                            </span>
                        <span class="fa-stack" style="cursor:pointer">
                                <i class="fa fa-circle fa-stack-2x" style="color:#151a23"></i>
                                <i class="fa fa-vk fa-stack-1x" style="color:#fff"></i>
                            </span>
                        <span class="fa-stack" style="cursor:pointer">
                                <i class="fa fa-circle fa-stack-2x" style="color:#151a23"></i>
                                <i class="fa fa-twitter fa-stack-1x" style="color:#fff"></i>
                            </span>
                    </p>
                <?php } ?>
            </div>
            <ul class="media-list">
                <?=$commentsHTML?>
            </ul>
        </div>
    </div>
</div>