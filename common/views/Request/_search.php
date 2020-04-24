<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\searches\RequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'PersonCount') ?>

    <?= $form->field($model, 'Tasks') ?>

    <?= $form->field($model, 'Objective') ?>

    <?= $form->field($model, 'Issue') ?>

    <?php // echo $form->field($model, 'ProductResults') ?>

    <?php // echo $form->field($model, 'Cost') ?>

    <?php // echo $form->field($model, 'TZ') ?>

    <?php // echo $form->field($model, 'RequestDate') ?>

    <?php // echo $form->field($model, 'ParentID') ?>

    <?php // echo $form->field($model, 'IsActual') ?>

    <?php // echo $form->field($model, 'VersionDate') ?>

    <?php // echo $form->field($model, 'DeleteDate') ?>

    <?php // echo $form->field($model, 'StatusID') ?>

    <?php // echo $form->field($model, 'TypeID') ?>

    <?php // echo $form->field($model, 'PersonParentID') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
