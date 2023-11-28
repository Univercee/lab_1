<?php
    if(empty($_GET['id'])){
        header('Location: rooms');
    }
    else{
        $room = (new RoomsController())->get($_GET['id']);
        if(empty($room)){
            header('Location: rooms');
        }
    }
?>
<div class="container-md d-flex flex-column gap-4 mb-5">
    <h4><a href="./rooms">К объявлениям</a></h4>
    <div class="row mb-5">
        <div class="col-md-3"></div>
        <h2 class="col-md-6"><?php echo $room['name']?></h2>
        <div class="col-md-3"></div>
    </div>


    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 d-flex justify-content-center">
            <img style="height:200px;" src="./inc/catalog_images/rooms/<?php echo $room["image"] ?>" alt="">
        </div>
        <div class="col-md-3"></div>
    </div>
    <?php if($auth){ ?>
        <div class="row mb-5">
            <div class="col-md-3"></div>
            <a class="btn btn-primary text-white col-md-6" href="./room-image-edit?id=<?php echo $room["id"]?>">Изменить фотографию</a>
            <div class="col-md-3"></div>
        </div>
    <?php } ?>

    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Дата создания</p>
        </div>
        <div class="col-md-3 text-end">
            <p><?php echo $room["created_at"]?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Цена</p>
        </div>
        <div class="col-md-3 text-end">
            <p><?php echo $room["price"]?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Описание</p>
        </div>
        <div class="col-md-3 text-end">
            <p><?php echo $room["description"]?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p class="bold">Ответсвенный</p>
        </div>
        <div class="col-md-3 text-end">
            <p><?php echo $room["employer"]?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <?php
        if($auth){
            ?>

            <div class="row">
                <div class="col-md-3"></div>
                <a class="btn btn-primary text-white col-md-6" href="./room-edit?id=<?php echo $room["id"]?>">Редактировать</a>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <a class="btn btn-danger text-white col-md-6" href="./room-delete-action?id=<?php echo $room["id"]?>">Удалить</a>
                <div class="col-md-3"></div>
            </div>

            <?php
        }
    ?>
</div>