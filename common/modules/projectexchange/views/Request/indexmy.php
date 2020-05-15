<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\projectexchange\models\searches\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = Yii::t('app', 'Requests');
// $this->params['breadcrumbs'][] = $this->title;
?>

<a href="/projectexchange/request/create" class="btn btn-sm btn-success">Подать заявку на создание проекта</a>
<a href="/projectexchange/project/indexall" class="btn btn-sm btn-default">Все проекты</a>
<a href="/projectexchange/project/indexmy" class="btn btn-sm btn-primary">Мои проекты</a>
<a href="/projectexchange/request/indexmy" class="btn btn-sm btn-warning">Мои заявки</a>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>


</div>
