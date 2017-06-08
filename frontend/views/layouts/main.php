<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php $this->registerLinkTag(['rel' => 'canonical', 'href' => \yii\helpers\Url::canonical()]); ?>
</head>
<body>

<div id="fb-root"></div>
<script >
    window.fbAsyncInit = function() {
        FB.init({appId: '172703143260889', status: true, cookie: true, xfbml: true});
    };
    (function() {
        var e = document.createElement('script');
        e.type = 'text/javascript';
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
    }());
</script>

<?php $this->beginBody() ?>

<script>var _auth = <?=(Yii::$app->user->id) ? 'true' : 'false'?>;</script>
<div class="navbar navbar-inverse navbar-fixed-top top-menu "><?php //navbar-static-top ?>

     <div class="navbar-overlay"></div>
     <div class="navbar-modal navbar-site-menu" id="mobileMenu">
        <div class="navbar-modal-content">
            <div>
                <a class="navbar-brand hs-logo text-logo-menu">
                    <span class="logo-text navbar-text first-word">Hearth</span>
                    <span class="logo-text navbar-text second-word">Gid</span>
                </a>
            </div>
            <div>
                <form action="" method="GET" autocomplete="off" class="mobile-search-form">
                    <span class="mobile-search-icon">
                        <button class="btn btn-link pointer btn-search" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                    <input type="text" class="mobile-search" name="q" maxlength="200" tabindex="1" placeholder="Поиск">
                </form>
            </div>
            <ul class="menu" id="mobile-menu">
                <li class="menu-home menu__item1 menu__item">
                    <a itemprop="url" href="/hearthstone/ru/" class="menu__link menu__link--is-active" data-analytics="primary-nav-link" data-analytics-placement="Home">
                        <span itemprop="name">Главная</span>
                    </a>
                </li>
                <li class="menu-game-guide menu__item2 menu__item has-dropdown" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                    <a itemprop="url" href="/hearthstone/ru/game-guide/" class="menu__link" data-analytics="primary-nav-link" data-analytics-placement="Game Guide">
                        <span itemprop="name">Руководство</span>
                        <i class="menu-icon menu-icon--caret-down"></i>
                    </a>
                </li>
                <li class="menu-expansions-adventures menu__item3 menu__item has-dropdown" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                    <a itemprop="url" href="/hearthstone/ru/expansions-adventures/" class="menu__link" data-analytics="primary-nav-link" data-analytics-placement="Card Sets">
                        <span itemprop="name">Наборы карт</span>
                        <i class="menu-icon menu-icon--caret-down"></i>
                    </a>

                </li>
                <li class="menu-community menu__item4 menu__item has-dropdown" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                    <a itemprop="url" href="/hearthstone/ru/forum/" class="menu__link" data-analytics="primary-nav-link" data-analytics-placement="Community">
                        <span itemprop="name">Сообщество</span>
                        <i class="menu-icon menu-icon--caret-down"></i>
                    </a>
                </li>
                <li class="menu-blog menu__item5 menu__item" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                    <a itemprop="url" href="/hearthstone/ru/blog/" class="menu__link" data-analytics="primary-nav-link" data-analytics-placement="News">
                        <span itemprop="name">Новости</span>
                    </a>
                </li>
                <li class="menu-fsg menu__item6 menu__item" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                    <a itemprop="url" href="/hearthstone/ru/fireside-gatherings/" class="menu__link" data-analytics="primary-nav-link" data-analytics-placement="Fireside Gatherings">
                        <span itemprop="name">Fireside Gathering</span>
                    </a>
                </li>
                <li class="menu-esports menu__item7 menu__item has-dropdown" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                    <a itemprop="url" href="/hearthstone/ru/esports/" class="menu__link" data-analytics="primary-nav-link" data-analytics-placement="Esports">
                        <span itemprop="name">Киберспорт</span>
                        <i class="menu-icon menu-icon--caret-down"></i>
                    </a>
                </li>
            </ul>
            <div class="navbar-modal-close">
                <i class="fa fa-times" style="font-size: 2em;" aria-hidden="true"></i>
            </div>
        </div>
        <div class="navbar-modal-close-gutter"></div>
    </div>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Open</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a onclick="javascript: window.history.back();" class="header__home hidden-md hidden-lg hidden-sm dark-icon">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>

            <a href="/" class="navbar-brand hs-logo hidden-xs">
                <img width="45" src="/img/logo.png"/>
                <span class="logo-text navbar-text first-word">Hearth</span>
                <span class="logo-text navbar-text second-word">Gid</span>
            </a>
        </div>
        <div class="hidden-xs col-sm-1"></div>
        <div class="collapse navbar-collapse" id="main_menu">
            <ul class="nav js-nav navbar-nav museo_title">
                <li class="is-active" data-color="#fff"><a href="#">Новости</a></li>
                <li data-color="#ccc"><a href="#">Колоды</a></li>
                <li data-color="red" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Архив <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">2017</a></li>
                        <li><a href="#">2016</a></li>
                    </ul>
                </li>
                <li  data-color="green"><a href="#">Гайды</a></li>
                <li  data-color="blue"><a href="#">Карты</a></li>
                <li class="nav__line js-moving-line is-init"></li>
            </ul>
            <form class="navbar-form navbar-right hidden-sm" method="POST">
                <input type="search" class="search-head" placeholder="Поиск...">&nbsp;<button class="btn btn-link pointer btn-search" type="submit"><i class="fa fa-search"></button></i>
            </form>
            <!-- sm search -->
            <button class="show_search btn btn-link pointer btn-search hidden-md hidden-lg hidden-xs navbar-form navbar-right" type="button">
                <i class="fa fa-search"></i>
            </button>
        </div>
        <!-- sm search -->
        <div class="hidden-md hidden-lg hidden-xs hidden-sm" id="compact_search">
            <form class="navbar-form navbar-right" action="search.php" method="POST" style="width: 100%;">
                <input type="search" class="search-head " placeholder="Поиск..." style="width: 90%;">&nbsp;<button class="btn btn-link pointer btn-search" type="submit">Найти</button>
            </form>
        </div>
    </div>
</div>

<?= $content ?>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
