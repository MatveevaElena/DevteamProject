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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="nav_bg bs_out">
        <div class="nav">
        <div class="nav_tit">
            <h1>
            <span>Самарский государственный</span>
            технический университет
            </h1>
        </div>
        <nav>
            <a class="nav_elem" href="/site/index">Главная</a>
            <a class="nav_elem" href="/news/index">Новости</a>
            <a class="nav_elem" href="/project/index">Проекты</a>
            <a class="nav_elem" href="/site/about">О сайте</a>
        </nav>
        <div class="nav_auth">
            <a class="nav_elem" href="/site/login">Вход</a>
            <a class="nav_elem" href="/site/signup">Регистрация</a>
        </div>
        </div>
    </div>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

<div class="footer bs_out">
    <div class="footer_logo">
      <img src="/icons/logo.svg" alt="Logo">
    </div>
    <div class="footer_nav">
      <div class="footer_nav_cont">
        <a class="footer_nav_elem" href="/site/index">Главная</a>
        <a class="footer_nav_elem" href="/project/index">Проекты</a>
        <a class="footer_nav_elem" href="/news/index">Новости</a>
        <a class="footer_nav_elem" href="/site/about">О сайте</a>
        <a class="footer_nav_elem" href="/site/signup">Регистрация</a>
      </div>
    </div>
    <div class="footer_soc">
      <div class="footer_soc_elem">
        <img src="/icons/vk.svg" alt="Vk">
      </div>
      <div class="footer_soc_elem">
        <img src="/icons/facebook.svg" alt="Facebook">
      </div>
      <div class="footer_soc_elem">
        <img src="/icons/instagram.svg" alt="Instagram">
      </div>
      <div class="footer_soc_elem">
        <img src="/icons/twitter.svg" alt="Twitter">
      </div>
    </div>
  </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
