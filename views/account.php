<?php
    if(!$auth){
        header("Location: login");
    }
?>
<div class="container-md d-flex flex-column gap-4 mb-5">
    <div class="row mb-5">
        <div class="col-md-3"></div>
        <h2 class="col-md-6">Данные пользователя</h2>
        <div class="col-md-3"></div>
    </div>


    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 d-flex justify-content-center">
            <img style="height:200px; border-radius: 50%;" src="./inc/catalog_images/users/<?php echo $user["image"]??"image_default.png" ?>" alt="">
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row mb-5">
        <div class="col-md-3"></div>
        <a class="btn btn-primary text-white col-md-6" href="./image-edit">Изменить фотографию</a>
        <div class="col-md-3"></div>
    </div>

    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">ФИО</p>
        </div>
        <div class="col-md-3 text-end">
            <p><?php echo empty($user["name"])?"не указано":$user["name"]?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Пол</p>
        </div>
        <div class="col-md-3 text-end">            
            <p><?php 
                switch($user["sex"]){
                    case 0:
                        echo is_null($user["sex"])?"не указано":"Женский";
                        break;
                    case 1:
                        echo "Мужской";
                        break;
                    default:
                        echo "не указано";
                        break;
                };
            ?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Дата рождения</p>
        </div>
        <div class="col-md-3 text-end">
            <p><?php echo ($user["birthday"]=="0000-00-00"||empty($user["birthday"]))?"не указано":$user["birthday"]?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Адрес</p>
        </div>
        <div class="col-md-3 text-end">
            <p><?php echo empty($user["address"])?"не указано":$user["address"]?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Интересы</p>
        </div>
        <div class="col-md-3 text-end">
            <p><?php echo empty($user["description"])?"не указано":$user["description"]?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Ссылка на vk</p>
        </div>
        <div class="col-md-3 text-end">
            <p><?php echo empty($user["vk_link"])?"не указано":$user["vk_link"]?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Группа крови</p>
        </div>
        <div class="col-md-3 text-end">
            <p><?php 
                switch($user["blood_type"]){
                    case 1:
                        echo "I";
                        break;
                    case 2:
                        echo "II";
                        break;
                    case 3:
                        echo "III";
                        break;
                    case 4:
                        echo "IV";
                        break;
                    default:
                        echo "не указано";
                        break;
            };
            ?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Резус фактор</p>
        </div>
        <div class="col-md-3 text-end">
        <p><?php 
                switch($user["rh_factor"]){
                    case 0:
                        echo is_null($user["rh_factor"])?"не указано":"Отрицательный";
                        break;
                    case 1:
                        echo "Положительный";
                        break;
                    default:
                        echo "не указано";
                        break;
                };
            ?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <a class="btn btn-primary text-white col-md-6" href="./account-edit">Редактировать</a>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <a class="btn btn-danger text-white col-md-6" href="./logout">Выйти</a>
        <div class="col-md-3"></div>
    </div>
</div>