<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\projectexchange\models\searches\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('ML', 'Requests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('ML', 'Create Request'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            //'PersonCount',
            [
                'attribute' => 'PersonCount',
                'header' => Yii::t('ML','Person Count'),
            ],
            //'Tasks:ntext',
            [
                'attribute' => 'Tasks',
                'header' => Yii::t('ML','Tasks'),
            ],
            //'Objective:ntext',
            [
                'attribute' => 'Objective',
                'header' => Yii::t('ML','Objective'),
            ],
            //'Issue:ntext',
            [
                'attribute' => 'Issue',
                'header' => Yii::t('ML','Issue'),
            ],
            //'ProductResults:ntext',
            //'Cost',
            //'TZ',
            //'RequestDate',
            //'ParentID',
            //'IsActual',
            //'VersionDate',
            //'DeletedDate',
            //'StatusID',
            //'TypeID',
            //'PersonID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
