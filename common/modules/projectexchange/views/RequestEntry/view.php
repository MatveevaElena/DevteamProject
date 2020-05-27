<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\roles\models\User;
use common\modules\projectexchange\assets\ProjectAsset;

ProjectAsset::register($this);

?>

<h1></h1>

    <h1 class="requestentry_header-view">Заявка на участие в проекте "<?= $model->project->Name ?>"</h1>
    <br>
    <div class="requestentry_container">
        <div class="requestentry_container-left">
            <div class="requestentry_details">
                <h2><?= Yii::t('ML', 'Person ID') ?>:</h2>
                <p><?= $model->person->fio ?></p><br>
                <h2><?= Yii::t('ML', 'Request Date') ?>:</h2>
                <p><?= $model->formatedRequestDate ?></p><br>
                <h2><?= Yii::t('ML', 'Experience') ?>:</h2>
                <p><?= $model->Experience ?></p><br>
                <h2><?= Yii::t('ML', 'Target') ?>:</h2>
                <p><?= $model->Target ?></p><br>
                <h2><?= Yii::t('ML', 'Status ID') ?>:</h2>
                <p><?= $model->status->Name ?></p><br>
            </div>
        </div>
        <div class="requestentry_container-right">
            <div class="requestentry_container-img">
                <img src="/projectexchange/project/showimage?id=<?= $model->project->ID ?>" class="requestentry_img" alt="Изображение проекта">
            </div>
        </div>
    </div>
    <p>
    <?php if($model->StatusID == 1 && Yii::$app->user->identity->myuser->PersonID == $model->PersonID){ ?>
    <?= Html::a(Yii::t('ML', 'Update'), ['update', 'id' => $model->ID], ['class' => 'button_type_blue']) ?>
    <?= Html::a(Yii::t('ML', 'Delete'), ['delete', 'id' => $model->ID], [
        'class' => 'button_type_red',
        'data' => [
            'confirm' => Yii::t('ML', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
    <?= Html::a(Yii::t('ML', 'Approve'), ['approve', 'id' => $model->ID], [
        'class' => 'button_type_green',
        'data' => [
            'confirm' => Yii::t('ML', 'Are you sure you want to approve this item?'),
            'method' => 'post',
        ],
    ]) ?>
    <?php } ?>
    <?php if($model->StatusID == 2){ ?>
    <?= Html::a(Yii::t('ML', 'Decline'), ['declinemoderator', 'id' => $model->ID], [
        'class' => 'button_type_red',
        'data' => [
            'confirm' => Yii::t('ML', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
    <?= Html::a(Yii::t('ML', 'Approve'), ['approvemoderator', 'id' => $model->ID], [
        'class' => 'button_type_green',
        'data' => [
            'confirm' => Yii::t('ML', 'Are you sure you want to approve this item?'),
            'method' => 'post',
        ],
    ]) ?>
    <?php } ?>
</p>

<style>
.requestentry_header-view{
    font-size: 2em;
}
.requestentry_container{
    /* background-color: lightblue; */
    display: flex;
    flex-wrap: none;
    min-height: 300px;
}
.requestentry_container-left{
    display: flex;
    width: 60%;
}
.requestentry_container-right{
    display: flex;
    width: 40%;
    padding-left: 10px;
    box-sizing: border-box;
}
.requestentry_container-img{
    display: flex;
}
.requestentry_img{
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}
</style>

  