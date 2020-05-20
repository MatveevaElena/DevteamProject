<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\searches\RequestEntrySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-entry-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'RequestDate') ?>

    <?= $form->field($model, 'Experience') ?>

    <?= $form->field($model, 'Target') ?>

    <?= $form->field($model, 'ParentID') ?>

    <?php // echo $form->field($model, 'IsActual') ?>

    <?php // echo $form->field($model, 'VersionDate') ?>

    <?php // echo $form->field($model, 'DeletedDate') ?>

    <?php // echo $form->field($model, 'StoredFileID') ?>

    <?php // echo $form->field($model, 'request_entrycol') ?>

    <?php // echo $form->field($model, 'ProjectParentID') ?>

    <?php // echo $form->field($model, 'StatusID') ?>

    <?php // echo $form->field($model, 'PersonID') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('ML', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
