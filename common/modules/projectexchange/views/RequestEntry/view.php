<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


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
        <?= Html::a(Yii::t('ML', 'Update'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('ML', 'Delete'), ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('ML', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'RequestDate',
            'Experience:ntext',
            'Target',
          //  'ParentID',
            //'IsActual',
           // 'VersionDate',
           // 'DeletedDate',
            'StoredFileID',
            'ProjectParentID',
           // 'StatusID',
            [
                'attribute' => 'StatusID',
                'value' => function($model){
                    return $model->status->Name;
                },
            ],
            'PersonID',
        //    [
        //     'attribute' => 'PersonID',
        //     'value' => function($model){
        //         return $model->person->fio;
        //     },
        //     ],
        ],
    ]) ?>

</div>
