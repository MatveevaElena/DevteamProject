<?php

use phpDocumentor\Reflection\Types\Integer;

/* @var $this yii\web\View */

$this->title = 'Новости | Проектная платформа СамГТУ';
?>
<section class="news">
  <div class="news_container">
    <?php
    foreach ($api as $news) {
      echo $this->render('_templnews', ['news' => $news]);
    }
    ?>
    <!-- Pagination -->
    <div class="pagin_container">
      <div class="pagin">
        <div class="pagin_nav current">
          1 из 5
        </div>
        <a href="">
          <div class="pagin_nav first">
            <img src="@/assets/icons/chevron-left-double.svg" alt="">
          </div>
        </a>
        <div class="pagin_page_list">
          <a href="">
            <div class="page pagin_nav prev">
              <img src="@/assets/icons/chevron-left.svg" alt="">
            </div>
          </a>
          <a href="">
            <div class="page">1</div>
          </a>
          <a href="">
            <div class="page">2</div>
          </a>
          <a href="">
            <div class="page">3</div>
          </a>
          <a href="">
            <div class="page">4</div>
          </a>
          <a href="">
            <div class="page">5</div>
          </a>
          <a href="">
            <div class="page pagin_nav next">
              <img src="@/assets/icons/chevron-right.svg" alt="">
            </div>
          </a>
        </div>
        <a href="">
          <div class="pagin_nav last">
            <img src="@/assets/icons/chevron-right-double.svg" alt="">
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="news_filter">
    <!-- Filters -->
    <div class="filter_elem">
      <h4>Категории</h4>
      <div class="filter_category_select">
        <select name="" id="">
          <option value="">Общие</option>
          <option value="">IT</option>
          <option value="">Инженеринг</option>
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
  </div>
</section>
