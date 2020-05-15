<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\modules\roles\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\projectexchange\models\searches\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Requests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Request'), ['create'], ['class' => 'btn btn-success']) ?>
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
            //'StatusID',
            //'TypeID',
            //'PersonID',
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
