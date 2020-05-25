<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\modules\projectexchange\models\RequestStatus;
use common\modules\projectexchange\models\RequestType;


/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\RequestEntry */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Request Entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-entry-view">

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
            'ID',
            'RequestDate',
            'Experience:ntext',
            'Target',
           // 'ParentID',
            //'IsActual',
            //'VersionDate',
            //'DeletedDate',
            'StoredFileID',
            //'ProjectParentID',
            [
                'attribute' => 'ProjectParentID',
                'value' => function($model){
                    return $model->project->Name;
                },
            ],
            //'StatusID',
            [
                'attribute' => 'StatusID',
                'value' => function($model){
                    return $model->status->Name;
                },
            ],
            //'PersonParentID',
            [
                'attribute' => 'PersonID',
                'value' => function($model){
                    return $model->person->fio;
                },
            ],
        ],
    ]) ?>

</div>
