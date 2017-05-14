<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="container main index_page main-detail">
    <div class="row top-bg hidden-xs"><div class="small-bg" style="background-image: url('/img/bg2.png');"></div></div>

    <!--<div class="row top-bg">
        <div class="container_title museo_title">ТОП</div>
        <div class="container">

        </div>
    </div>-->

    <div class="row">
        <div class="container_title top_container museo_title">НОВОЕ</div>
        <div class="container container_main">
            <div class="col-xs-12 col-sm-12 col-md-8 no-padding">
                <div class="row main_item">
                    <div class="thumbnail col-xs-12 col-md-4  col-sm-4">
                        <a href="detail.php">
                            <img src="/img/n1.png" alt="" />
                        </a>
                    </div>
                    <div class="caption index-post-title col-md-8  col-sm-8">
                        <header class="detail_header_index">
                            <h3 class="preview_title museo_title entry-title"><a href="detail.php">В тёмном омуте</a></h3>
                            <p class="preview_text">Новая колода зулока от представителя Украины DrHippi</p>
                            <footer class="block_footer on_main">
                                4 ноября 2017 / 10 просмотров
                            </footer>
                        </header>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 no-padding">
                <div class="row main_item">
                    <div class="thumbnail col-xs-12 col-sm-4 col-md-4">
                        <a href="detail.php">
                            <img src="/img/n2.jpg" alt="">
                        </a>
                    </div>
                    <div class="caption index-post-title col-md-8 col-sm-8">
                        <header class="detail_header_index">
                            <h3 class="preview_title museo_title entry-title"><a href="detail.php">Хозяин таверны в городе</a></h3>
                            <p class="preview_text">Новое приключение от Blizzard в котором найдется место для каждого героя...</p>

                            <footer class="block_footer on_main">
                                <time itemprop="dateCreated" datetime="2017-03-29T20:16:49+00:00">1 ноября 2017</time> / 100 просмотров
                            </footer>
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
