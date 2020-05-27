<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\news\models\searches\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Date') ?>

    <?= $form->field($model, 'Authors') ?>

    <?= $form->field($model, 'Img') ?>

    <?= $form->field($model, 'Views') ?>

    <?php // echo $form->field($model, 'Title') ?>

    <?php // echo $form->field($model, 'Description') ?>

    <?php // echo $form->field($model, 'Main') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('ML', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
