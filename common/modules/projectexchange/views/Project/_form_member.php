<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\modules\projectexchange\models\PersonlinkRole;
use common\modules\projectexchange\models\PersonlinkStatus;
use kartik\typeahead\Typeahead;


/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TeamID')->hiddenInput()->label(false) ?>

    <?= $form->field($model->team, 'Name')->textInput(['disabled'=>'disabled']) ?>

    <?= $form->field($model, 'PersonID')->widget(Typeahead::classname(), [
        'options' => ['placeholder' => 'Filter as you type ...'],
        'pluginOptions' => ['highlight'=>true],
        'dataset' => [
            [
                // 'local' => $data,
                'remote' => [
                    'url' => Url::to(['/projectexchange/person/addmember']) . '?q=%QUERY',
                    'wildcard' => '%QUERY'
                ],
                'limit' => 10
            ]
        ]
    ]); ?>

    <?= $form->field($model, 'RoleID')->dropDownList(ArrayHelper::map(PersonlinkRole::find()->all(),'ID','Name')) ?>

    <?= $form->field($model, 'StatusID')->dropDownList(ArrayHelper::map(PersonlinkStatus::find()->all(),'ID','Name')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
