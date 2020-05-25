<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\modules\projectexchange\models\RequestStatus;
use common\modules\projectexchange\models\RequestType;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\Request */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if($model->StatusID == 2){ ?>
        <?= Html::a(Yii::t('ML', 'Backtoupdate'), ['backtoupdate', 'id' => $model->ID], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => Yii::t('ML', 'Are you sure you want to Backtoupdate this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('ML', 'Decline'), ['declinemoderator', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('ML', 'Are you sure you want to Decline this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('ML', 'Approve'), ['approvemoderator', 'id' => $model->ID], [
            'class' => 'btn btn-warning',
            'data' => [
                'confirm' => Yii::t('ML', 'Are you sure you want to approve this item?'),
                'method' => 'post',
            ],
        ]) ?>
    <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'ID',
            'PersonCount',
            'Tasks:ntext',
            'Objective:ntext',
            'Issue:ntext',
            'ProductResults:ntext',
            'Cost',
            'TZ',
            'RequestDate',
            //'ParentID',
            //'IsActual',
            'VersionDate',
            //'DeletedDate',
            //'StatusID',
            [
                'attribute' => 'StatusID',
                'value' => function($model){
                    return $model->statusName;
                },
                'filter' => ArrayHelper::map(RequestStatus::find()->where(['!=','ID',1])->asArray()->all(), 'ID', 'Name'),
                'header' => Yii::t('ML','Status ID'),
            ],
            //'TypeID',
            [
                'attribute' => 'TypeID',
                'value' => function($model){
                    return $model->typeName;
                },
                'filter' => ArrayHelper::map(RequestType::find()->all(),'ID','Name'),
                'header' => Yii::t('ML','Type ID'),
            ],
           // 'PersonID',
           [
            'attribute' => 'PersonID',
            'value' => function($model){
                return $model->person->fio;
            },
        ],
        ],
    ]) ?>

</div>
