<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PersonlinkRole */

$this->title = Yii::t('app', 'Update Personlink Role: {name}', [
    'name' => $model->Name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personlink Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="personlink-role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
