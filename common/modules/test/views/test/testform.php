<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\modules\projectexchange\models\RequestEntry */
/* @var $form yii\widgets\ActiveForm */

$data = [
    '1'=>'value1',
    '2'=>'value2',
    '3'=>'value3',
    '4'=>'value4',
]
?>

<div class="request-entry-form">
    <pre>
        <?php if(isset($post))var_dump($post); ?>
    </pre>

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'Field1')->widget(Select2::classname(), [
        'name' => 'color_2',
        'value' => ['red', 'green'], // initial value
        'data' => $data,
        'maintainOrder' => true,
        'options' => ['placeholder' => 'Select a color ...', 'multiple' => true],
        'pluginOptions' => [
            // 'tags' => true,
            'maximumInputLength' => 10
        ],
    ]); ?>

    <?= $form->field($model, 'Field2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Field3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Field4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Field5')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
