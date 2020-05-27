<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\modules\projectexchange\models\PersonlinkRole;
use common\modules\projectexchange\models\PersonlinkStatus;
use kartik\select2\Select2;
use yii\web\JsExpression;
use common\modules\projectexchange\models\Team;

//var_dump($model);die;


/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TeamID')->dropDownList(ArrayHelper::map(Team::find()->asArray()->all(), 'ID', 'Name'),['readonly'=>'readonly']) ?>
    <br>
    <?= $form->field($model, 'PersonID')->hiddenInput()->label(false); ?>
    
    <?= $form->field($model->person, 'Fio')->dropDownList([$model->PersonID => $model->person->fio],['readonly'=>'readonly'])->label(Yii::t('ML','Person ID')) ?>
    <br>
    <?= $form->field($model, 'RoleID')->dropDownList(ArrayHelper::map(PersonlinkRole::find()->all(),'ID','Name')) ?>
    <br>
    <?= $form->field($model, 'StatusID')->dropDownList(ArrayHelper::map(PersonlinkStatus::find()->all(),'ID','Name')) ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Save'), ['class' => 'button_type_green']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
