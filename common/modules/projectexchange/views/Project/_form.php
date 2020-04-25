<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'BeginDate')->textInput() ?>

    <?= $form->field($model, 'EndDate')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PersonCount')->textInput() ?>

    <?= $form->field($model, 'ParentID')->textInput() ?>

    <?= $form->field($model, 'IsActual')->textInput() ?>

    <?= $form->field($model, 'VersionDate')->textInput() ?>

    <?= $form->field($model, 'DeletedDate')->textInput() ?>

    <?= $form->field($model, 'TypeID')->textInput() ?>

    <?= $form->field($model, 'StatusID')->textInput() ?>

    <?= $form->field($model, 'RequestParentID')->textInput() ?>

    <?= $form->field($model, 'TeamID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
