<?php

//если пользователь не авторизован
if(!isset($_COOKIE['session_token'])){
    $_SESSION['errors'] = ["Время входа в аккаунт закончилось, перезайдите"];
    header('Location: login');
}

//запрос к базе данных
$room = new RoomsController();
$errors = $room->delete($_GET['id']);

//обработка ответа
header('Location: rooms');
$_SESSION['errors'] = $errors;

?>