<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\modules\projectexchange\models\Project;
use common\modules\projectexchange\models\ProjectTag;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProjectTagID')->dropDownList(ArrayHelper::map(ProjectTag::find()->asArray()->all(), 'ID', 'Name')) ?>

    <?= $form->field($model, 'ProjectParentID')->dropDownList(ArrayHelper::map(Project::find()->asArray()->all(), 'ParentID', 'Name'),['readonly'=>'readonly']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
