<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TeamPersonlink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-personlink-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ParentID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IsActual')->textInput() ?>

    <?= $form->field($model, 'VersionDate')->textInput() ?>

    <?= $form->field($model, 'DeleteDate')->textInput() ?>

    <?= $form->field($model, 'RoleID')->textInput() ?>

    <?= $form->field($model, 'TeamID')->textInput() ?>

    <?= $form->field($model, 'StatusID')->textInput() ?>

    <?= $form->field($model, 'PersonParentID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
