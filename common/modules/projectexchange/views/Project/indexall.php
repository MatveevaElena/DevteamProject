<?php

use common\modules\projectexchange\assets\ProjectAsset;
use frontend\assets\MediaAsset;
ProjectAsset::register($this);
$media = MediaAsset::register($this);

// var_dump($media->baseUrl);die;
?>

<section class="proj" >
  <div class="proj_container" style="background-color: #e5e5e5 !important">
      <?php
        foreach($dataProvider->getModels() as $key => $value){
      ?>
      <div class="proj_elem">
        <h2><?= $value['Name'] ?></h2>
        <p><?= $value->Description ? $value->Description : '&nbsp' ?></p>
        <div class="proj_table">
          <div class="proj_col"><?= Yii::t('ML','Type ID') ?></div>
          <div class="proj_col"><?= $value->projectType->Name ?></div>
          <div class="proj_col"><?= Yii::t('ML','Status ID') ?></div>
          <div class="proj_col"><?= $value->projectStatus->Name ?></div>
          <div class="proj_col"><?= Yii::t('ML','Begin Date') ?></div>
          <div class="proj_col"><?= $value->formatedBeginDate ?></div>
        </div>
        <div class="proj_img">
          <img src="/projectexchange/project/showimage?id=<?=$value->ID ?>" alt="Изображение проекта">
        </div>
        <div class="proj_footer">
          <div class="proj_buttons">
            <div class="proj_ico pointer">
              <div class="i_heart"></div>
            </div>
            <span>44</span>
            <div class="proj_ico">
              <div class="i_views"></div>
            </div>
            <span>546</span>
            <div class="proj_ico">
              <div class="i_comment"></div>
            </div>
            <span>12</span>
          </div>
          <div class="proj_url">
            <button data-id="<?= $value->ID ?>" class="type_1_rev view_project">Подробнее</button>
          </div>
        </div>
      </div>
      <?php } ?>

      <div class="pagin_container">
    		<div class="pagin">
    			<div class="pagin_nav current">
            1 из 5
    			</div>
    			<a href="">
    				<div class="pagin_nav first">
    					<img src="<?= $media->baseUrl ?>/icons/chevron-left-double.svg" alt="">
    				</div>
    			</a>
    			<div class="pagin_page_list">
    				<a href="">
    					<div class="page pagin_nav prev">
    						<img src="<?= $media->baseUrl ?>/icons/chevron-left.svg" alt="">
    					</div>
    				</a>
    				<a href=""><div class="page">1</div></a>
    				<a href=""><div class="page">2</div></a>
    				<a href=""><div class="page">3</div></a>
    				<a href=""><div class="page">4</div></a>
    				<a href=""><div class="page">5</div></a>
    				<a href="">
    					<div class="page pagin_nav next">
    						<img src="<?= $media->baseUrl ?>/icons/chevron-right.svg" alt="">
    					</div>
    				</a>
    			</div>
    			<a href="">
    				<div class="pagin_nav last">
    					<img src="<?= $media->baseUrl ?>/icons/chevron-right-double.svg" alt="">
    				</div>
    			</a>
    		</div>
    	</div>
    </div>
  </div>
  <div class="proj_filter">
    <a href="/projectexchange/request/create" class="type_1">Создать проект</a>
    <a href="/projectexchange/project/indexall" class="type_1">Все проекты</a>
    <a href="/projectexchange/project/indexmy" class="type_1">Мои проекты</a>
    <a href="/projectexchange/request/indexmy" class="type_1">Мои заявки</a>
    <a href="/projectexchange/requestentry/create" class="type_1">Присоедениться</a>
    <div class="filter_elem">
      <h4>Категории</h4>
      <div class="filter_category_select">
        <select name="" id="">
          <option value="">Все</option>
          <option value="">Машиностроение</option>
          <option value="">IT-технологии</option>
          <option value="">Финансы</option>
        </select>
      </div>
    </div>
    <div class="filter_elem">
      <h4>Сортировать</h4>
      <div class="filter_sort_select">
        <select name="" id="">
          <option value="">Популярные</option>
          <option value="">Новые</option>
          <option value="">Старые</option>
        </select>
      </div>
    </div>
    <div class="filter_elem">
      <h4>Статус</h4>
      <div class="filter_category_select">
        <select name="" id="">
          <option value="">Все</option>
          <option value="">Закончен</option>
          <option value="">Разработка</option>
        </select>
      </div>
    </div>
  </div>
</section>