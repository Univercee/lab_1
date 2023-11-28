<?php

//если пользователь не авторизован
if(!isset($_COOKIE['session_token'])){
    $_SESSION['errors'] = ["Время входа в аккаунт закончилось, перезайдите"];
    header('Location: login');
}

//запрос к базе данных
$user = new UserController();
$image = $_FILES['image']['name']?$_FILES['image']:null;
$errors = $user->uploadImage($image);

//обработка ответа
header('Location: account');
$_SESSION['errors'] = $errors;

?>