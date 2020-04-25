<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\projectexchange\models\searches\TeamPersonlinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Team Personlinks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-personlink-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Team Personlink'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ParentID',
            'IsActual',
            'VersionDate',
            'DeletedDate',
            //'RoleID',
            //'TeamID',
            //'StatusID',
            //'PersonParentID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
