<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\searches\PersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'LastName') ?>

    <?= $form->field($model, 'FirstName') ?>

    <?= $form->field($model, 'MiddleName') ?>

    <?= $form->field($model, 'BirthDate') ?>

    <?php // echo $form->field($model, 'ParentID') ?>

    <?php // echo $form->field($model, 'IsActual') ?>

    <?php // echo $form->field($model, 'VersionDate') ?>

    <?php // echo $form->field($model, 'DeleteDate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
