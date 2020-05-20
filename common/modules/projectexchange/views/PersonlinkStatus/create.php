<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\PersonlinkStatus */

$this->title = Yii::t('ML', 'Create Personlink Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Personlink Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personlink-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
