<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

        <?php
        // var_dump($news_array)
        foreach($news_array as $news){
            echo '<li>'.$news.'</li>';
        }
        ?>

    <div class="jumbotron">
        <h1>Новости!</h1>
        <ul>
            <?php
            // var_dump($news_array)
            foreach($news_array as $news){
                echo '<li>'.$news.'</li>';
            }
            ?>
        </ul>
        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

</div>
