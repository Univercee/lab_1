<?php

//если пользователь не авторизован
if(!isset($_COOKIE['session_token'])){
    $_SESSION['errors'] = ["Время входа в аккаунт закончилось, перезайдите"];
    header('Location: login');
}

//запрос к базе данных
$room = new RoomsController();
$image = $_FILES['image']['name']?$_FILES['image']:null;
$response = $room->add($image, $_POST['name'], $_POST['description'], $_POST['price'], $_POST['employer_id']);

//обработка ответа
header('Location: room?id='.$response["id"]);
$_SESSION['errors'] = $response["errors"];

?>