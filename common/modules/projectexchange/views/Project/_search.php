<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\searches\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'BeginDate') ?>

    <?= $form->field($model, 'EndDate') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'PersonCount') ?>

    <?php // echo $form->field($model, 'ParentID') ?>

    <?php // echo $form->field($model, 'IsActual') ?>

    <?php // echo $form->field($model, 'VersionDate') ?>

    <?php // echo $form->field($model, 'DeletedDate') ?>

    <?php // echo $form->field($model, 'TypeID') ?>

    <?php // echo $form->field($model, 'StatusID') ?>

    <?php // echo $form->field($model, 'RequestParentID') ?>

    <?php // echo $form->field($model, 'TeamID') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('ML', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
