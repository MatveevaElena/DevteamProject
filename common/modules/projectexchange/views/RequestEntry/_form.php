<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\RequestEntry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-entry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RequestDate')->textInput() ?>

    <?= $form->field($model, 'Experience')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ParentID')->textInput() ?>

    <?= $form->field($model, 'IsActual')->textInput() ?>

    <?= $form->field($model, 'VersionDate')->textInput() ?>

    <?= $form->field($model, 'DeleteDate')->textInput() ?>

    <?= $form->field($model, 'StoredFileID')->textInput() ?>

    <?= $form->field($model, 'request_entrycol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProjectParentID')->textInput() ?>

    <?= $form->field($model, 'StatusID')->textInput() ?>

    <?= $form->field($model, 'PersonParentID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
