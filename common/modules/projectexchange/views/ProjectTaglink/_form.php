<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\modules\projectexchange\models\Project;
use common\modules\projectexchange\models\ProjectTag;
/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\ProjectTaglink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-taglink-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProjectTagID')->dropDownList(ArrayHelper::map(ProjectTag::find()->asArray()->all(), 'ID', 'Name')) ?>

    <?= $form->field($model, 'ProjectParentID')->dropDownList(ArrayHelper::map(Project::find()->asArray()->all(), 'ParentID', 'Name')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
