<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
// var_dump($model);
// die;
/* @var $this yii\web\View */
/* @var $model common\modules\news\models\News */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">
    <div class="fullnews_container">
        <div class="fullnews_title">
            <h1><?php echo $model->title ?></h1>
        </div>
        <div class="fullnews_title_img">

        </div>
        <div class="fullnews_description">
            <h2><?php echo $model->description ?></h2>
        </div>
        
        <?php echo $model->main ?>
    </div>
</div>
