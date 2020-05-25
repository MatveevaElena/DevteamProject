<?php

/* @var $this yii\web\View */

$this->title = 'Новости | Проектная платформа СамГТУ';
?>
<section class="news">
  <div class="news_container">
    <!-- News Elem -->
    <div class="news_elem">
      <h2>Заголовок</h2>
      <div class="news_text">
        <time>22.02.20</time> - Автор
      </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <div class="news_img">
        <img src="@/assets/img/test.jpg" alt="Изображение новости. Alt заменить на заголовок">
      </div>
      <div class="news_footer">
        <div class="news_buttons">
          <div class="news_ico pointer">
            <div class="i_heart"></div>
          </div>
          <span>565</span>
          <div class="news_ico">
            <div class="i_views"></div>
          </div>
          <span>3342</span>
          <div class="news_ico">
            <div class="i_comment"></div>
          </div>
          <span>35</span>
        </div>
        <div class="news_url">
          <button class="type_1">Подробнее</button>
        </div>
      </div>
    </div>
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
					<a href=""><div class="page">1</div></a>
					<a href=""><div class="page">2</div></a>
					<a href=""><div class="page">3</div></a>
					<a href=""><div class="page">4</div></a>
					<a href=""><div class="page">5</div></a>
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
          <option value="">Весёлые</option>
          <option value="">Грустные</option>
          <option value="">Нормальные</option>
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
