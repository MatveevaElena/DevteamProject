<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\modules\roles\models\User;
use common\modules\projectexchange\models\RequestStatus;
use common\modules\projectexchange\models\RequestType;
use common\modules\projectexchange\models\Person;
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
            // 'StatusID',
            [
                'attribute' => 'StatusID',
                'value' => function($model){
                    return $model->statusName;
                },
                'filter' => ArrayHelper::map(RequestStatus::find()->all(),'ID','Name'),
                'header' => Yii::t('ML','Status ID'),
            ],
           // 'TypeID',
            [
                'attribute' => 'TypeID',
                'value' => function($model){
                    return $model->typeName;
                },
                'filter' => ArrayHelper::map(RequestType::find()->all(),'ID','Name'),
                'header' => Yii::t('ML','Type ID'),
            ],
            //'PersonID',
            [
                'attribute' => 'PersonID',
                'value' => function($model){
                    return $model->person->fio;
                },
                'header' => Yii::t('ML','Person ID'),
            ],
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
