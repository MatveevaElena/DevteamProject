<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\TeamPersonlink */

$this->title = Yii::t('app', 'Create Team Personlink');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Team Personlinks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-personlink-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
