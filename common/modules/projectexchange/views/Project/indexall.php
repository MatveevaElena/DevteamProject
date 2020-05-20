<a href="/projectexchange/request/create" class="btn btn-sm btn-success">Подать заявку на создание проекта</a>
<a href="/projectexchange/project/indexall" class="btn btn-sm btn-default">Все проекты</a>
<a href="/projectexchange/project/indexmy" class="btn btn-sm btn-primary">Мои проекты</a>
<a href="/projectexchange/request/indexmy" class="btn btn-sm btn-warning">Мои заявки</a>
<a href="/projectexchange/requestentry/create" class="btn btn-sm btn-success">Подать заявку на участие</a>

<?php
// var_dump($projects);
foreach($dataProvider->getModels() as $key => $value){ 

?>



<div class="test-container">
    <div class="test-project">
        <div class="test-project-img"></div>
        <div class="test-project-name"><a href="/projectexchange/project/view?id=<?php echo $value['ID'] ?>"><?= $value['Name'] ?></a></div>
        <div class="test-project-text"><a href=" /projectexchange/requestentry/create?id=<?php echo $value['ID'] ?>">Подать заявку</a></div>
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
    a.link {
        color:black !important;
    }
</style>