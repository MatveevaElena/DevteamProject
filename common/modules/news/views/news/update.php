<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\news\models\News */

$this->title = Yii::t('ML', 'Update News: {name}', [
    'name' => $model->Title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('ML', 'Update');
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
