<div class="news_elem">
      <h2>
        <?php
          echo $news['Title'];
        ?>
      </h2>
      <div class="news_text">
        <time>
            <?php
                echo $news->dayDate;
            ?>
        </time> - 
        <?php
            echo $news->Authors;
        ?>
      </div>
      <p>
        <?php
          echo $news['Main'];
        ?>
      </p>
      <div class="news_img">
        <img src="@/assets/img/sap.png" alt="Изображение новости. Alt заменить на заголовок">
      </div>
      <div class="news_footer">
        <div class="news_buttons">
          <div class="news_ico pointer">
            <div class="i_heart"></div>
          </div>
          <span>
              <?php
                echo $news->likesCount;
              ?>
          </span>
          <div class="news_ico">
            <div class="i_views"></div>
          </div>
          <span>
            <?php
              echo $news['Views'];
            ?>
          </span>
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