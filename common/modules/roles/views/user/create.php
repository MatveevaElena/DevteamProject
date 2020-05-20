<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\roles\models\User */

$this->title = Yii::t('ML', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
