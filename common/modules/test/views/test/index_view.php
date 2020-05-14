<?php
// var_dump($projects);
foreach($projects as $key => $value){ 

?>

<div class="test-container">
    <div class="test-project">
        <div class="test-project-img"></div>
        <div class="test-project-name"><?= $value['Name'] ?></div>
        <div class="test-project-text"><a href="application?id=<?php echo $value['ID'] ?>">Подать заявку</a></div>
    </div>
</div>

<?php } ?>






<style>
    .test-container{
        display: flex;
        width: 100%;
    }
    .test-project{
        display: flex;
        width: 200px;
        height: 200px;
        flex-wrap: wrap;
        margin: 20px;
    }
    .test-project-img{
        width: 200px;
        height: 100px;
        background-color: coral;
    }
    .test-project-name{
        width: 200px;
        height: 50px;
        background-color: lightgreen;
    }
    .test-project-text{
        width: 200px;
        height: 50px;
        background-color: yellow;
    }
</style>