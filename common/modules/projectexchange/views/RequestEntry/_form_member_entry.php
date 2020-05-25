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


    
    <?= $form->field($model, 'PersonID')->widget(Select2::classname(), [ 
        'data'=>[$model->PersonID=>$model->person->fio],
        'options' => ['placeholder' => 'Filter as you type ...','readonly'=>'readonly'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => Url::to(['/projectexchange/person/addmember']),
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(item) { console.log(item);return item.text; }'),
            'templateSelection' => new JsExpression('function (item) { console.log(item);return item.text; }'),
        ],
    ]); ?>

    <?= $form->field($model, 'RoleID')->dropDownList(ArrayHelper::map(PersonlinkRole::find()->all(),'ID','Name')) ?>

    <?= $form->field($model, 'StatusID')->dropDownList(ArrayHelper::map(PersonlinkStatus::find()->all(),'ID','Name')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
