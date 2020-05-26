<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use common\modules\projectexchange\models\ProjectType;
use common\modules\projectexchange\models\ProjectStatus;
use common\modules\projectexchange\models\Team;
/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'BeginDate')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'EndDate')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PersonCount')->textInput() ?>

    <?= $form->field($model, 'TypeID')->dropDownList(ArrayHelper::map(ProjectType::find()->asArray()->all(), 'ID', 'Name')) ?>

    <?= $form->field($model, 'StatusID')->dropDownList(ArrayHelper::map(ProjectStatus::find()->asArray()->all(), 'ID', 'Name')) ?>

    <?= $form->field($model, 'TeamID')->dropDownList(ArrayHelper::map(Team::find()->asArray()->all(), 'ID', 'Name')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
