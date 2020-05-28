<?php
use yii\helpers\URL;

//$url = Url::to(['site/news', 'id' => $news['ID']]);
?>

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
              echo $news['Description'];
            ?>
        </p>
    <div class="news_img">
        <img src="/news/news/showimage?id=<?= $news->ID ?>" alt="Тут должно быть изображение, но почему-то оно не захотело загрузиться">
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
        <!-- <div class="news_ico">
            <div class="i_comment"></div>
        </div>
            <span>-</span> -->
        </div>
            <div class="news_url">
                <?php
                    //echo '<a class="type_1" href = "/news/'.$news['ID'].'">Подробнее</a>'
                    echo '<a class="type_1" href = "'.Url::to(['news/news/view', 'id' => $news['ID']]).'">Подробнее</a>'
                ?>
        </div>
    </div>
</div>
