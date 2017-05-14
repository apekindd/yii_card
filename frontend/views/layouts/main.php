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
<?php $this->beginBody() ?>
<div class="navbar navbar-inverse navbar-fixed-top top-menu "><?php //navbar-static-top ?>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main_menu">
                <span class="sr-only">Open</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" title="Home" class="navbar-brand hs-logo"><img width="45" src="/img/logo.png"/></a>
            <span class="logo-text navbar-text">CARDSTONE</span>
        </div>
        <div class="hidden-xs col-sm-1"></div>
        <div class="collapse navbar-collapse" id="main_menu">
            <ul class="nav navbar-nav museo_title">
                <li class="active"><a href="#">Новости</a></li>
                <li><a href="#">Колоды</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Архив <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">2017</a></li>
                        <li><a href="#">2016</a></li>
                    </ul>
                </li>
                <li><a href="#">Гайды</a></li>
                <li><a href="#">Карты</a></li>
            </ul>
            <form class="navbar-form navbar-right hidden-sm" action="search.php" method="POST">
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
