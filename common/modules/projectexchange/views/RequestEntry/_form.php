<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\modules\projectexchange\models\Project;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\RequestEntry */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="request-entry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RequestDate')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy'
        ]
    ])
    ?>

    <?= $form->field($model, 'Experience')->widget(\common\components\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'Target')->widget(\common\components\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'StoredFileID')->fileinput() ?>

    <?= $form->field($model, 'request_entrycol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProjectParentID')->dropDownList(ArrayHelper::map(Project::find()->asArray()->all(), 'ParentID', 'Name'))  ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
