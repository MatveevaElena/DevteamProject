<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\modules\roles\models\User;
use common\modules\projectexchange\models\RequestStatus;

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
            'PersonCount',
            'Tasks:ntext',
            'Objective:ntext',
            'Issue:ntext',
            //'ProductResults:ntext',
            //'Cost',
            //'TZ',
            //'RequestDate',
            //'ParentID',
            //'IsActual',
            //'VersionDate',
            //'DeletedDate',
            // 'StatusID',
            [
                'attribute' => 'StatusID',
                'value' => function($model){
                    return $model->statusName;
                },
                'filter' => ArrayHelper::map(RequestStatus::find()->all(),'ID','Name'),
                'header' => Yii::t('ML','Status ID'),
            ],
            'TypeID',
            'PersonID',
            [
                'class' => 'yii\grid\ActionColumn'
                ,'visible' => User::checkAccess('admin')
                ,'template' => '{view_moderator}{update}{delete}'
                ,'buttons' => [
                    'view_moderator' => function ($url,$model) {
                        return Html::a('', '/projectexchange/request/viewmoderator?id='.$model->ID, ['class' => 'glyphicon glyphicon-eye-open']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
