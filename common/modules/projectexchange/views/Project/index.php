<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\projectexchange\models\searches\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('ML', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('ML', 'Create Project'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            //'BeginDate',
            [
                'attribute' => 'BeginDate',
                'format' => ['date','php:d.m.Y'],
                'header' => Yii::t('ML','Begin Date'),
            ],
            //'EndDate',
            [
                'attribute' => 'EndDate',
                'format' => ['date','php:d.m.Y'],
                'header' => Yii::t('ML','End Date'),
            ],
            //'Name',
            [
                'attribute' => 'Name',
                'header' => Yii::t('ML','Name'),
            ],
            //'PersonCount',
            [
                'attribute' => 'PersonCount',
                'header' => Yii::t('ML','Person Count'),
            ],
            //'ParentID',
            //'IsActual',
            //'VersionDate',
            //'DeletedDate',
            //'TypeID',
            //'StatusID',
            //'RequestParentID',
            //'TeamID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
