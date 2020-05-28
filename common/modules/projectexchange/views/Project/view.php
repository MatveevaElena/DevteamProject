<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\roles\models\User;
use common\modules\projectexchange\assets\ProjectAsset;

ProjectAsset::register($this);

$this->title = $model->Name;

?>
<div class="fullproj_img bs_out">
  <div class="fullproj_bg">
    <img src="/projectexchange/project/showimage?id=<?= $model->ID ?>" alt="<?= $model->Name ?>">
  </div>
  <div class="fullproj_content">
    <h2><?= $model->Name ?></h2>
    <div class="proj_table">
      <div class="proj_col"><?= Yii::t('ML', 'Type ID') ?></div>
      <div class="proj_col"><?= $model->projectType->Name ?></div>
      <div class="proj_col"><?= Yii::t('ML', 'Status ID') ?></div>
      <div class="proj_col"><?= $model->projectStatus->Name ?></div>
      <div class="proj_col"><?= Yii::t('ML','Implementation period') ?></div>
      <div class="proj_col"><?= $model->implementationPeriod ?></div>
    </div>
  </div>
</div>
<?php if (false) { ?>
<div class="fullproj_container">
  <h3>Администрирование</h3>
  <p>Этот блок видно только руководителям проекта</p>
  <button data-id="<?= $model->ID ?>" class="type_1_rev">Заявки на вступление</button>
</div>
<?php } ?>
<div class="fullproj_container">
  <h3><?= Yii::t('ML', 'Description') ?></h3>
  <p><?= $model->Description ?></p>
  <div class="fullproj_tags bs_out"><b><?=  Yii::t('ML','Tags') ?>:</b> <?= $model->tagsString ?></div>
</div>
<div class="fullproj_container">
  <h3>Команда проекта</h3>
  <?php foreach($memberDataProvider->getModels() as $index => $item){ ?>
  <div class="fullproj_table">
      <div class="fullproj_table_id"><?= $index+1 ?></div>
      <div class="fullproj_table_col bs_out"><?= $item->person->fio ?></div>
      <div class="fullproj_table_col bs_out"><?= $item->role->Name ?></div>
      <div class="fullproj_table_col bs_out"><?= $item->status->Name ?></div>
      <?php if (false) { ?>
      <div class="fullproj_table_col bs_out">
        <button data-id="<?= $model->ID ?>" class="type_1">Управление</button>
      </div>
      <?php } ?>
  </div>
  <?php } ?>
</div>
<?php if (true) { ?>
<div class="fullproj_container">
  <h3>Хочешь присоедениться?</h3>
  <p>Подай завяку и жди решения руководителя</p>
  <button data-id="<?= $model->ID ?>" class="project_signup-button type_1_rev">Подать заявку на участие</button>
</div>
<?php } ?>
