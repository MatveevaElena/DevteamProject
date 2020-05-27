<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\RequestEntry */

$this->title = Yii::t('ML', 'Update Request Entry "{name}"', [
    'name' => $model->project->Name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Request Entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('ML', 'Update');
?>
<div class="request-entry-update">

    <h1 style="font-size: 2rem;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
