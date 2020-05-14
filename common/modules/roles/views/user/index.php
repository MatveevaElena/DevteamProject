<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\roles\models\searches\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            [
                'attribute' => 'PersonID',
                'value' => function($model){
                    return $model->personName;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{update}{delete}{roles}',
                'buttons'=>[
                    'roles'=>function ($url, $model) {
                        $t = '/roles/user/roles?id='.$model->id;
                        return Html::a('', $t, ['class' => 'glyphicon glyphicon-user']);
                    },
                ],
            ],
        ]
    ]); ?>


</div>
