<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\projectexchange\models\searches\RequestEntrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('ML', 'Request Entries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-entry-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('ML', 'Create Request Entry'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            //'RequestDate',
            [
                'attribute' => 'RequestDate',
                'format' => ['date','php:d.m.Y'],
                'header' => Yii::t('ML','Request Date'),
            ],
            'Experience:ntext',
            //'Target',
            [
                'attribute' => 'Target',
                'header' => Yii::t('ML','Target'),
            ],
            'ParentID',
            //'IsActual',
            //'VersionDate',
            //'DeletedDate',
            //'StoredFileID',
            //'request_entrycol',
            //'ProjectParentID',
            //'StatusID',
            //'PersonID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
