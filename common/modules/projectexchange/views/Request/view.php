<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
    <?php if($model->StatusID == 1){ ?>
        <?= Html::a(Yii::t('ML', 'Update'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('ML', 'Delete'), ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('ML', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('ML', 'Approve'), ['approve', 'id' => $model->ID], [
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
            //'VersionDate',
           // 'DeletedDate',
            //'StatusID',
            [
                'attribute' => 'StatusID',
                'value' => function($model){
                    return $model->status->Name;
                },
            ],
            //'TypeID',
            [
                'attribute' => 'TypeID',
                'value' => function($model){
                    return $model->type->Name;
                },
            ],
            //'PersonID',
            [
                'attribute' => 'PersonID',
                'value' => function($model){
                    return $model->person->fio;
                },
            ],
        ],
    ]) ?>

</div>
