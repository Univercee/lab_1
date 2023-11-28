<?php

//если пользователь не авторизован
if(!isset($_COOKIE['session_token'])){
    $_SESSION['errors'] = ["Время входа в аккаунт закончилось, перезайдите"];
    header('Location: login');
}

//запрос к базе данных
$room = new RoomsController();
var_dump($_POST);
$errors = $room->edit($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['employer_id']);

//обработка ответа
header('Location: room?id='.$_POST['id']);
$_SESSION['errors'] = $errors;

?>