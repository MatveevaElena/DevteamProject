<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\RequestEntry */

$this->title = Yii::t('ML', 'Create Request Entry');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Request Entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-entry-create">

    <h1 style="font-size: 2rem;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
