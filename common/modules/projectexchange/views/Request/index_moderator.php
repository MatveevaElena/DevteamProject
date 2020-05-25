<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\modules\projectexchange\models\RequestStatus;
use common\modules\projectexchange\models\RequestType;

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
            'PersonID',
            [
                'attribute' => 'RequestDate',
                'format' => ['date','php:d.m.Y'],
                'header' => Yii::t('ML','Request Date'),
            ],
            //'PersonCount',
            [
                'attribute' => 'PersonCount',
                'header' => Yii::t('ML','Person Count'),
            ],
            //'Cost',
            [
                'attribute' => 'Cost',
                'header' => Yii::t('ML','Cost'),
            ],
            //'TZ',
            [
                'attribute' => 'TZ',
                'header' => Yii::t('ML','TZ'),
            ],
            //StatusID
            [
                'attribute' => 'StatusID',
                'value' => function($model){
                    return $model->statusName;
                },
                'filter' => ArrayHelper::map(RequestStatus::find()->where(['!=','ID',1])->asArray()->all(), 'ID', 'Name'),
                'header' => Yii::t('ML','Status ID'),
            ],
            //TypeID
            [
                'attribute' => 'TypeID',
                'value' => function($model){
                    return $model->typeName;
                },
                'filter' => ArrayHelper::map(RequestType::find()->all(),'ID','Name'),
                'header' => Yii::t('ML','Type ID'),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($myUrl, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::toRoute(['viewmoderator', 'id' => $model->ID]));
                    },
                ],
                'template' => '{view}'
            ],
        ],
    ]); ?>


</div>
