<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\modules\projectexchange\models\ProjectTag;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\projectexchange\models\searches\ProjectTaglinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('ML', 'Project Taglinks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-taglink-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('ML', 'Create Project Taglink'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            //'ProjectTagID',
            [
                'attribute' => 'ProjectTagID',
                'value' => function($model){
                    return $model->tagName;
                },
                'filter' => ArrayHelper::map(ProjectTag::find()->all(),'ID','Name'),
                'header' => Yii::t('ML','Project Tag ID'),
            ],
            'ProjectParentID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
