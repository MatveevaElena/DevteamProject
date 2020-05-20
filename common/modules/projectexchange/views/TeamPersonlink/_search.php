<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\searches\TeamPersonlinkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-personlink-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ParentID') ?>

    <?= $form->field($model, 'IsActual') ?>

    <?= $form->field($model, 'VersionDate') ?>

    <?= $form->field($model, 'DeletedDate') ?>

    <?php // echo $form->field($model, 'RoleID') ?>

    <?php // echo $form->field($model, 'TeamID') ?>

    <?php // echo $form->field($model, 'StatusID') ?>

    <?php // echo $form->field($model, 'PersonID') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('ML', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
