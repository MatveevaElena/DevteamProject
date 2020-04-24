<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectTaglink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-taglink-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProjectTagID')->textInput() ?>

    <?= $form->field($model, 'ProjectID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
