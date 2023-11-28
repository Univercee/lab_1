<?php

//парсим url
$path = parse_url($_SERVER['REQUEST_URI'])["path"];
$splited_path = array_filter(explode('/', $path));
$filtered_path = [];
foreach($splited_path as $key => $value){
    array_push($filtered_path, $value);
}
$path_length = count($filtered_path);


//выводим нужную страницу, в зависимости от полученного пути
if($path_length > 2) {
    include('views/notFound.php');
}
else if($path_length == 1) {
    include('views/example.php');
}
else {
    $endpoint = $filtered_path[1];
    switch($endpoint){

        //отображение страниц
        case 'login':
            include('views/login.php');
            break;
        case 'signup':
            include('views/signup.php');
            break;
        case 'account':
            include('views/account.php');
            break;
        case 'rooms':
            include('views/rooms.php');
            break;
        case 'room':
            include('views/room.php');
            break;
        case 'account-edit':
            include('views/account-edit.php');
            break;
        case 'image-edit':
            include('views/image-edit.php');
            break;
        case 'room-image-edit':
            include('views/room-image-edit.php');
            break;
        case 'room-create':
            include('views/room-create.php');
            break;
        case 'room-edit':
            include('views/room-edit.php');
            break;
        case 'room-delete':
            include('views/room-delete.php');
            break;

        //обработка форм
        case 'signup-action':
            include('views/actions/signup.php');
            break;
        case 'login-action':
            include('views/actions/login.php');
            break;
        case 'account-edit-action':
            include('views/actions/account-edit.php');
            break;
        case 'image-edit-action':
            include('views/actions/image-edit.php');
            break;
        case 'room-create-action':
            include('views/actions/room-create.php');
            break;
        case 'room-edit-action':
            include('views/actions/room-edit.php');
            break;
        case 'room-delete-action':
            include('views/actions/room-delete.php');
            break;
        case 'room-image-edit-action':
            include('views/actions/room-image-edit.php');
            break;
        case 'logout':
            include('views/actions/logout.php');
            break;
        
        //страница по умолчанию
        default:
            include('views/notFound.php');
            break;
    }
}


?>