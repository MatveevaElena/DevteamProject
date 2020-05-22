<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\modules\projectexchange\models\PersonlinkRole;
use common\modules\projectexchange\models\Team;
use common\modules\projectexchange\models\RequestStatus;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\projectexchange\models\searches\TeamPersonlinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('ML', 'Team Personlinks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-personlink-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('ML', 'Create Team Personlink'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            // 'ParentID',
            // 'IsActual',
            // 'VersionDate',
            // 'DeletedDate',
            //'RoleID',
            [
                'attribute' => 'RoleID',
                'value' => function($model){
                    return $model->roleName;
                },
                'filter' => ArrayHelper::map(PersonlinkRole::find()->all(),'ID','Name'),
                'header' => Yii::t('ML','Role ID'),
            ],
            //'TeamID',
            [
                'attribute' => 'TeamID',
                'value' => function($model){
                    return $model->teamName;
                },
                'filter' => ArrayHelper::map(Team::find()->all(),'ID','Name'),
                 'header' => Yii::t('ML','Team ID'),
            ],
            //'StatusID',
            [
                'attribute' => 'StatusID',
                'value' => function($model){
                    return $model->statusName;
                },
                'filter' => ArrayHelper::map(RequestStatus::find()->all(),'ID','Name'),
                 'header' => Yii::t('ML','Status ID'),
            ],
            'PersonID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
