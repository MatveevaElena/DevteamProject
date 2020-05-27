<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\modules\projectexchange\models\RequestType;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' => 'model-form']]); ?>

    <?= $form->field($model, 'PersonCount')->textInput() ?>

    <?= $form->field($model, 'Tasks')->widget(\common\components\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'Objective')->widget(\common\components\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'Issue')->widget(\common\components\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'ProductResults')->widget(\common\components\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'Cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TypeID')->dropDownList(ArrayHelper::map(RequestType::find()->asArray()->all(), 'ID', 'Name')) ?>

    <?= $form->field($model, 'TZ')->fileinput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
