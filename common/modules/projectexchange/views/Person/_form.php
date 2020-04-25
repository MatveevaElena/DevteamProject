<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MiddleName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BirthDate')->textInput() ?>

    <?= $form->field($model, 'ParentID')->textInput() ?>

    <?= $form->field($model, 'IsActual')->textInput() ?>

    <?= $form->field($model, 'VersionDate')->textInput() ?>

    <?= $form->field($model, 'DeletedDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
