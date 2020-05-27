<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\roles\models\User;
use common\modules\projectexchange\assets\ProjectAsset;

ProjectAsset::register($this);

?>

    <h1 class="project_header-view"><?= $model->Name ?></h1>
    <br>
    <div class="project_container">
        <div class="project_container-left">
            <div class="project_container-img">
                <img src="/projectexchange/project/showimage?id=<?= $model->ID ?>" class="project_img" alt="Изображение проекта">
            </div>
        </div>
        <div class="project_container-right">
            <div class="project_container-desctiption">
                <h2><?= Yii::t('ML', 'Description') ?></h2>
                <!-- <p><?= $model->Description ?></p> -->
                <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis praesentium recusandae ea? Tempora hic quod, dignissimos quisquam consequatur ullam, recusandae molestias molestiae corrupti harum saepe repellendus, rerum dolore? Esse, vitae?</p><br>
                <h2><?= Yii::t('ML', 'Type ID') ?></h2>
                <p><?= $model->projectType->Name ?></p><br>
                <h2><?= Yii::t('ML', 'Status ID') ?></h2>
                <p><?= $model->projectStatus->Name ?></p><br>
                <h2><?= Yii::t('ML','Implementation period') ?></h2>
                <p><?= $model->implementationPeriod ?></p><br>
                <h2><?=  Yii::t('ML','Tags') ?></h2>
                <p><?= $model->tagsString ?></p>
            </div>
        </div>
    </div>
    <h1 class="project_header-view">Команда проекта</h1>
    <br>
    <div class="project_team">
        <?php foreach($memberDataProvider->getModels() as $index => $item){ ?>
        <div class="project_team_item">
            <div class="project_team_item-serial"><?= $index+1 ?></div>
            <div class="project_team_item-fio"><?= $item->person->fio ?></div>
            <div class="project_team_item-role"><?= $item->role->Name ?></div>
            <div class="project_team_item-status"><?= $item->status->Name ?></div>
        </div>
        <?php } ?>
    </div>
    <br>
    <div class="project_signup">
        <button data-id="<?= $model->ID ?>" class="project_signup-button type_1_rev">Подать заявку на участие</button>
    </div>

<style>
.project_header-view{
    font-size: 2em;
}
.project_container{
    /* background-color: lightblue; */
    display: flex;
    flex-wrap: none;
    min-height: 300px;
}
.project_container-left{
    display: flex;
    width: 30%;
}
.project_container-right{
    display: flex;
    width: 70%;
    padding-left: 10px;
    box-sizing: border-box;
}
.project_container-img{
    display: flex;
}
.project_img{
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}
.project_container-description{

}
.project_signup{
    display: flex;
    align-items: center;
    justify-content: center;
}
.project_team{
    /* background-color: lightcoral; */
    display: flex;
    flex-wrap: wrap;
}
.project_team_item{
    display: flex;
    width: 100%;
}
.project_team_item div{
    outline: 1px solid black;
    box-sizing: border-box;
    padding: 5px;
}
.project_team_item-serial{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 5%;
}
.project_team_item-fio{
    display: flex;
    align-items: center;
    justify-content: left;
    /* min-width: 200px; */
    width: 45%;
}
.project_team_item-role{
    display: flex;
    align-items: center;
    justify-content: center;
    /* min-width: 200px; */
    width: 25%;
}
.project_team_item-status{
    display: flex;
    align-items: center;
    justify-content: center;
    /* min-width: 200px; */
    width: 25%;
    /* background-color: aqua; */
}
</style>
