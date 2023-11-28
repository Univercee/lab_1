<?php

//если пользователь не авторизован
if(!isset($_COOKIE['session_token'])){
    $_SESSION['errors'] = ["Время входа в аккаунт закончилось, перезайдите"];
    header('Location: login');
}

//запрос к базе данных
$user = new UserController();
$errors = $user->edit($_POST['name']??null, $_POST['sex']??null, $_POST['birthday']??null, 
                        $_POST['address']??null, $_POST['description']??null, $_POST['vk_link']??null,
                        empty($_POST['blood_type'])?null:$_POST['blood_type'], $_POST['rh_factor']??null);

//обработка ответа
header('Location: account');
$_SESSION['errors'] = $errors;

?>