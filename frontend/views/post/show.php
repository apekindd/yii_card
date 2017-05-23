<?php //echo '<pre>';print_r($post); echo '</pre>';?>
<div class="container main main-detail">
    <div class="row top_image">
        <div class="col-xs-12">
            <div class="thumbnail detail_thumb">
                <img class="detail-picture" src="/images/<?= $post->images->detail_picture ?>">
            </div>
            <div class="detail-post-title">
                <header class="detail_header">
                    <h1 class="entry-title"><?= $post->title ?></h1>
                    <p class="preview_text"><?= $post->preview_text ?></p>
                    <div class="block_footer ">
                        <time itemprop="dateCreated" class="entry-date updated td-module-date" datetime="2017-03-29T20:16:49+00:00">4 ноября 2017</time> / <?= $post->views ?> просмотров
                    </div>

                </header>
            </div>
        </div>
    </div>
    <div class="row white-bg">
        <div class="col-xs-12 col-md-8">
            <div class="container detail_content col-xs-12" >
                <?= $post->detail_text ?>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="comments">
                    <h3 class="title-comments">Комментарии (6)</h3>
                    <div class="row">
                        <div class="avatar">
                            <img src="" width="50" height="50" />
                            <div class="social"><span class="letter"><i class="fa fa-facebook" aria-hidden="true"></i></span></div>
                            <!--<div class="social"><span class="letter"><i class="fa fa-vk" aria-hidden="true"></i></span></div>-->
                        </div>
                        <form class="comments-form">
                            <p class="text">
                                <textarea  name="text"></textarea>
                            </p>
                            <p class="submit">
                                <input  type="button" class="comment" value="Комментировать" />
                            </p>
                        </form>
                    </div>

                    <ul class="media-list">
                        <!-- Комментарий (уровень 1) -->
                        <li class="media">
                            <div class="media-left">
                                <div class="avatar">
                                    <img class="media-object img-rounded" src="" alt="...">
                                    <div class="social"><span class="letter">B</span></div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <div class="author">Дима</div>
                                    <div class="metadata">
                                        <span class="date">16 ноября 2015, 13:43</span>
                                    </div>
                                </div>
                                <div class="media-text text-justify">Lorem ipsum dolor sit amet. Blanditiis praesentium voluptatum deleniti atque. Autem vel illum, qui blanditiis praesentium voluptatum deleniti atque corrupti. Dolor repellendus cum soluta nobis. Corporis suscipit laboriosam, nisi ut enim. Debitis aut perferendis doloribus asperiores repellat. sint, obcaecati cupiditate non numquam eius. Itaque earum rerum facilis. Similique sunt in ea commodi. Dolor repellendus numquam eius modi. Quam nihil molestiae consequatur, vel illum, qui ratione voluptatem accusantium doloremque.</div>
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
         <a href="#" class="reply">ответить</a>
        </span>
                                </div>

                                <!-- Вложенный медиа-компонент (уровень 2) -->
                                <div class="media">
                                    <div class="media-left">
                                        <div class="avatar">
                                            <img class="media-object img-rounded" src="" alt="...">
                                            <div class="social"><span class="letter">B</span></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <div class="author">Пётр</div>
                                            <div class="metadata">
                                                <span class="date">19 ноября 2015, 10:28</span>
                                            </div>
                                        </div>
                                        <div class="media-text text-justify">Dolor sit, amet, consectetur, adipisci velit. Aperiam eaque ipsa, quae. Amet, consectetur, adipisci velit, sed quia consequuntur magni dolores. Ab illo inventore veritatis et quasi architecto. Quisquam est, omnis voluptas nulla. Obcaecati cupiditate non numquam eius modi tempora. Corporis suscipit laboriosam, nisi ut labore et aut reiciendis.</div>
                                        <div class="footer-comment">
            <span class="vote plus" title="Нравится">
              <i class="fa fa-thumbs-up"></i>
            </span>
                                            <span class="rating">
              +0
            </span>
                                            <span class="vote minus" title="Не нравится">
              <i class="fa fa-thumbs-down"></i>
            </span>
                                            <span class="devide">
              |
            </span>
                                            <span class="comment-reply">
              <a href="#" class="reply">ответить</a>
            </span>
                                        </div>

                                        <!-- Вложенный медиа-компонент (уровень 3) -->
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar">
                                                    <img class="media-object img-rounded" src="" alt="...">
                                                    <div class="social"><span class="letter"><i class="fa fa-facebook" aria-hidden="true"></i></span></div>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <div class="author">Александр</div>
                                                    <div class="metadata">
                                                        <span class="date">Вчера в 19:34</span>
                                                    </div>
                                                </div>
                                                <div class="media-text text-justify">Amet, consectetur, adipisci velit, sed ut labore et dolore. Maiores alias consequatur aut perferendis doloribus asperiores. Voluptas nulla vero eos. Minima veniam, quis nostrum exercitationem ullam corporis. Atque corrupti, quos dolores eos, qui blanditiis praesentium voluptatum deleniti atque corrupti. Quibusdam et harum quidem rerum necessitatibus saepe eveniet, ut enim ipsam. Magni dolores et dolorum fuga nostrum exercitationem ullam. Eligendi optio, cumque nihil molestiae consequatur.</div>
                                                <div class="footer-comment">
                <span class="vote plus" title="Нравится">
                  <i class="fa fa-thumbs-up"></i>
                </span>
                                                    <span class="rating">
                  +5
                </span>
                                                    <span class="vote minus" title="Не нравится">
                  <i class="fa fa-thumbs-down"></i>
                </span>
                                                    <span class="devide">
                  |
                </span>
                                                    <span class="comment-reply">
                  <a href="#" class="reply">ответить</a>
                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Конец вложенного комментария (уровень 3) -->

                                    </div>
                                </div>
                                <!-- Конец вложенного комментария (уровень 2) -->

                                <!-- Ещё один вложенный медиа-компонент (уровень 2) -->
                                <div class="media">
                                    <div class="media-left">
                                        <div class="avatar">
                                            <img class="media-object img-rounded" src="" alt="...">
                                            <div class="social"><span class="letter"><i class="fa fa-facebook" aria-hidden="true"></i></span></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <div class="author">Сергей</div>
                                            <div class="metadata">
                                                <span class="date">20 ноября 2015, 17:45</span>
                                            </div>
                                        </div>
                                        <div class="media-text text-justify">Ex ea voluptate velit esse, quam nihil impedit, quo minus id quod. Totam rem aperiam eaque ipsa, quae ab illo. Minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Iste natus error sit voluptatem. Sunt, explicabo deleniti atque corrupti, quos dolores et expedita.</div>
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
              <a href="#" class="reply">ответить</a>
            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Конец ещё одного вложенного комментария (уровень 2) -->

                            </div>
                        </li>
                        <!-- Конец комментария (уровень 1) -->

                        <!-- Комментарий (уровень 1) -->
                        <li class="media">
                            <div class="media-left">
                                <div class="avatar">
                                    <img class="media-object img-rounded" src="" alt="...">
                                    <div class="social"><span class="letter"><i class="fa fa-facebook" aria-hidden="true"></i></span></div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <div class="author">Иван</div>
                                    <div class="metadata">
                                        <span class="date">Вчера в 17:34</span>
                                    </div>
                                </div>
                                <div class="media-text text-justify">Eum iure reprehenderit, qui dolorem eum fugiat. Sint et expedita distinctio velit. Architecto beatae vitae dicta sunt, explicabo unde omnis. Qui aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto. Nemo enim ipsam voluptatem quia. Eos, qui ratione voluptatem sequi nesciunt, neque porro. A sapiente delectus, ut enim ipsam voluptatem, quia non recusandae architecto beatae.</div>
                                <div class="footer-comment">
        <span class="vote plus" title="Нравится">
          <i class="fa fa-thumbs-up"></i>
        </span>
                                    <span class="rating">
          +2
        </span>
                                    <span class="vote minus" title="Не нравится">
          <i class="fa fa-thumbs-down"></i>
        </span>
                                    <span class="devide">
          |
        </span>
                                    <span class="comment-reply">
          <a href="#" class="reply">ответить</a>
        </span>
                                </div>
                            </div>
                        </li>
                        <!-- Конец комментария (уровень 1) -->

                        <!-- Комментарий (уровень 1) -->
                        <li class="media">
                            <div class="media-left">
                                <div class="avatar">
                                    <img class="media-object img-rounded" src="" alt="...">
                                    <div class="social"><span class="letter"><i class="fa fa-facebook" aria-hidden="true"></i></span></div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <div class="author">Дима</div>
                                    <div class="metadata">
                                        <span class="date">3 минуты назад</span>
                                    </div>
                                </div>
                                <div class="media-text text-justify">Tempore, cum soluta nobis est et quas. Quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in. Obcaecati cupiditate non recusandae impedit. Hic tenetur a sapiente delectus. Facere possimus, omnis dolor repellendus inventore veritatis et voluptates. Ipsa, quae ab illo inventore veritatis et quasi architecto beatae. In culpa, qui in culpa. Cum soluta nobis est laborum et aut perferendis doloribus. Vitae dicta sunt, explicabo perspiciatis. Amet, consectetur, adipisci velit, sed quia voluptas sit, aspernatur. Obcaecati cupiditate non provident, similique sunt in. Reiciendis voluptatibus maiores alias consequatur aut officiis debitis aut perferendis doloribus asperiores. Assumenda est, omnis dolor repellendus voluptas assumenda est omnis.</div>
                                <div class="footer-comment">
        <span class="vote plus" title="Нравится">
          <i class="fa fa-thumbs-up"></i>
        </span>
                                    <span class="rating">
          +0
        </span>
                                    <span class="vote minus" title="Не нравится">
          <i class="fa fa-thumbs-down"></i>
        </span>
                                    <span class="devide">
          |
        </span>
                                    <span class="comment-reply">
          <a href="#" class="reply">ответить</a>
        </span>
                                </div>
                            </div>
                        </li>
                        <!-- Конец комментария (уровень 1) -->

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
