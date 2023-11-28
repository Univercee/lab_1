<?php

//если пользователь не авторизован
if(!isset($_COOKIE['session_token'])){
    $_SESSION['errors'] = ["Время входа в аккаунт закончилось, перезайдите"];
    header('Location: login');
}

//запрос к базе данных
$room = new RoomsController();
$id = $_POST['id'];
$image = $_FILES['image']['name']?$_FILES['image']:null;
$errors = $room->uploadImage($image, $id);

$location = "room?id=$id";
//обработка ответа
header('Location:'.$location);
$_SESSION['errors'] = $errors;

?>