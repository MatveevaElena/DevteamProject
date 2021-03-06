<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\WhiteappAsset;
use common\widgets\Alert;

$asset = WhiteappAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php if ((Yii::$app->controller->id == 'site') and (Yii::$app->controller->action->id == 'index')) { ?>
<!-- Main Header -->
<div class="main_hdr bs_out">
  <div class="main_hdr_bg">
    <video preload="auto" autoplay loop muted>
      <source src="<?= $asset->baseUrl ?>/video/header_bg.mp4" type="video/mp4"></source>
    </video>
  </div>
  <div class="main_hdr_content">
    <!-- Header -->
    <header>
      <div class="header_logo">
        <img src="<?= $asset->baseUrl ?>/img/logo.png" alt="Проектная плафторма СамГТУ">
      </div>
      <nav>
        <a href="/" class="nav_elem an_2">Главная</a>
        <a href="/news" class="nav_elem an_2">Новости</a>
        <a href="/projects" class="nav_elem an_2">Проекты</a>
        <a href="/info" class="nav_elem an_2">Информация</a>
        <a href="/about" class="nav_elem an_2">О сайте</a>
      </nav>
      <div class="hdr_buttons">
        <button class="type_1" type="button">Вход</button>
        <button class="type_1" type="button">Регистрация</button>
      </div>
    </header>
    <!-- Header -->
    <div class="main_hdr_dscr">
      <h1>Проектная платформа СамГТУ</h1>
      <p>
        Инновационная платформа<br>
        для разработки и продвижения проектов.
      </p>
      <p>
        Перед тобой открыты все двери!<br>
        Поверь в себя и воплоти свои идеи в жизнь.
      </p>
    </div>
  </div>
</div>
<!-- Main Header -->
<?php } else { ?>
<!-- Header -->
<header class="header_bg bs_out">
  <div class="header_logo">
    <img src="<?= $asset->baseUrl ?>/img/logo.png" alt="Проектная плафторма СамГТУ">
  </div>
  <nav>
    <a href="/" class="nav_elem an_2">Главная</a>
    <a href="/news" class="nav_elem an_2">Новости</a>
    <a href="/projects" class="nav_elem an_2">Проекты</a>
    <a href="/info" class="nav_elem an_2">Информация</a>
    <a href="/about" class="nav_elem an_2">О сайте</a>
  </nav>
  <div class="hdr_buttons">
    <button class="type_1" type="button">Вход</button>
    <button class="type_1" type="button">Регистрация</button>
  </div>
</header>
<!-- Header -->
<?php } ?>

<!-- Body -->
<section class="section_container">
  <!-- <?= Breadcrumbs::widget([
      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
  ]) ?>
  <?= Alert::widget() ?> -->
  <?= $content ?>
</section>
<!-- Body -->

<!-- Footer -->
<footer class="bs_out">
  <div class="footer_container">
    <div class="footer_title"><span>Проектная платформа</span> СамГТУ</div>
    <div class="footer_nav">
      <a href="/" class="footer_nav_elem an_2">Главная</a>
      <a href="/news" class="footer_nav_elem an_2">Новости</a>
      <a href="/projects" class="footer_nav_elem an_2">Проекты</a>
      <a href="/info" class="footer_nav_elem an_2">Информация</a>
      <a href="/about" class="footer_nav_elem an_2">О сайте</a>
    </div>
  </div>
  <div class="footer_container">
    <div class="footer_copyright">
      Самарский государственный технический университет<br>
      Все права защищены
    </div>
  </div>
</footer>
<!-- Footer -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
