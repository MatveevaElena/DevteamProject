<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PersonCount')->textInput() ?>

    <?= $form->field($model, 'Tasks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Objective')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Issue')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ProductResults')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TZ')->textInput() ?>

    <?= $form->field($model, 'RequestDate')->textInput() ?>

    <?= $form->field($model, 'ParentID')->textInput() ?>

    <?= $form->field($model, 'IsActual')->textInput() ?>

    <?= $form->field($model, 'VersionDate')->textInput() ?>

    <?= $form->field($model, 'DeleteDate')->textInput() ?>

    <?= $form->field($model, 'StatusID')->textInput() ?>

    <?= $form->field($model, 'TypeID')->textInput() ?>

    <?= $form->field($model, 'PersonParentID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
