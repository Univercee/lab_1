
<div class="container">
    <div class="row d-flex justify-content-center">
        <?php if($auth){ ?>
            <div class="col-md-12 text-center mb-5">
                <a href="./room-create">Создать объявление</a>
            </div>
        <?php } ?>
        <?php
            $rooms = (new RoomsController())->getAll();
            foreach($rooms as $room){
                ?>

                <div class="card col-md-3 col-sm-6 m-2">
                    <img src="./inc/catalog_images/rooms/<?php echo empty($room["image"])?"no_image.jpg":$room["image"] ?>" class="card-img-top" alt="img">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $room["name"] ?></h5>
                        <p class="card-text"><?php echo $room["description"] ?></p>
                        <a href="./room?id=<?php echo $room["id"]?>" class="btn btn-primary text-white">К объявлению</a>
                    </div>
                </div>

                <?php
            }
        ?>
    </div>
</div>

