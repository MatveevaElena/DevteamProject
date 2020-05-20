<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use common\modules\roles\models\User;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\Project */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">
    <?php if (User::checkAccess('admin') || User::checkAccess('moderator')){ ?>
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
    <?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'BeginDate',
                'value' => date_create($model->BeginDate)->format('d.m.Y').'-'.date_create($model->EndDate)->format('d.m.Y')
            ],
            'Name',
            [
                'attribute' => 'TypeID',
                'value' => $model->projectType->Name
            ],
            [
                'attribute' => 'StatusID',
                'value' => $model->projectStatus->Name
            ]
        ],
    ]) ?>
    <?php if (User::checkAccess('admin') || User::checkAccess('moderator')){ ?>
        <p>
            <?= Html::a(Yii::t('ML', 'Add member'), ['addmember', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        </p>
    <?php } ?>
    <?= GridView::widget([
        'dataProvider' => $memberDataProvider,
        'filterModel' => $memberSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'PersonID',
                'value' => function($model){
                    return $model->person->fio;
                },
            ],
            [
                'attribute' => 'RoleID',
                'value' => function($model){
                    return $model->role->Name;
                },
            ],
            [
                'attribute' => 'StatusID',
                'value' => function($model){
                    return $model->status->Name;
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        $t = '/projectexchange/teampersonlink/view';
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', [Url::to($t),'id'=>$model->ID]);
                    },
                    'update'=>function ($url, $model) {
                        $t = '/projectexchange/teampersonlink/update';
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', [Url::to($t),'id'=>$model->ID]);
                    },
                    'delete'=>function ($url, $model) {
                        $t = '/projectexchange/teampersonlink/delete';
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', [Url::to($t),'id'=>$model->ID]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
