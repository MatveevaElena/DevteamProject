<?php
$lang = \Yii::$app->language;
$ml = require(dirname(dirname(dirname(dirname(dirname(__DIR__))))) . "/common/messages/$lang/ML.php");

return array_merge($ml, [
    'Create' => 'Сохранить',
    'Update' => 'Изменить',
    'Delete' => 'Удалить',
    'Backtoupdate' => 'Вернуть на доработку',
    'Decline' => 'Отклонить',
    'Approve' => 'Утвердить',
    'Status ID' => 'Статус',
    'Last Name' => 'Фамилия',
    'First Name' => 'Имя',
    'Middle Name' => 'Отчество',
    'Type ID' => 'Тип',
    'Person Count' => 'Количество участников',
    'Tasks'=> 'Задачи',
    'Objective'=> 'Цели',
    'Issue' => 'Проблематика',
    'Product Results' => 'Продуктовые результаты',
    'Cost'=> 'Стоимость',
    'Tz' => 'Техническое задание',
    'Request' => 'Заявка на создание проекта',
    'Requests' => 'Заявки на создание проекта',
    'Create Request' => 'Подать заявку на создание проекта',
    'Create Person' => 'Создать физ. лицо',
    'Request Date' => 'Дата подачи заявки',
    'Begin Date' => 'Дата начала',
    'End Date'=>'Дата завершения',
    'Name'=>'Название',
    'Experience' =>'Опыт',
    'Target' => 'Цели участия',
    'Role ID'=> 'Роль участника',
    'Team ID' => 'Команда',
    'Birth Date' => 'Дата рождения',
    'Team Col' => 'Количество участников команды'
]);
?>