<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\modules\roles\models\User */

$this->title = $user->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $user,
        'attributes' => [
            'id',
            'username',
            [
                'attribute' => 'PersonID',
                'value' => function($model){
                    return $model->personName;
                }
            ]
        ],
    ]) ?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'UserRoles')->widget(Select2::classname(), [
            'data' => $roles,
            'maintainOrder' => true,
            'options' => ['placeholder' => 'Select a role ...', 'multiple' => true],
            'pluginOptions' => [
                'maximumInputLength' => 10
            ],
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ML', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
