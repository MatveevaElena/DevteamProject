<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\projectexchange\models\searches\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('ML', 'People');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('ML', 'Create Person'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            //'LastName',
            [
                'attribute' => 'LastName',
                'header' => Yii::t('ML','Last Name'),
            ],
            //'FirstName',
            [
                'attribute' => 'FirstName',
                'header' => Yii::t('ML','First Name'),
            ],
            //'MiddleName',
            [
                'attribute' => 'MiddleName',
                'header' => Yii::t('ML','Middle Name'),
            ],
            //'BirthDate',
            [
                'attribute' => 'BirthDate',
                'format' => ['date','php:d.m.Y'],
                'header' => Yii::t('ML','Birth Date'),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
