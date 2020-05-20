<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\ProjectTaglink */

$this->title = Yii::t('ML', 'Create Project Taglink');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Project Taglinks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-taglink-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
