<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\PersonlinkRole */

$this->title = Yii::t('ML', 'Create Personlink Role');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Personlink Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personlink-role-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
