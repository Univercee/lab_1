<?php
    if(!$auth){
        header("Location: login");
    }
    $employees = (new EmployeesController())->getAll();
    $room = (new RoomsController())->get($_GET["id"]);
?>
<div class="container-sm row d-flex flex-column align-items-center mb-5">
    <h2 class="col-md-6">Создание объявления</h2>
    <form action="room-edit-action" method="POST" enctype="multipart/form-data"  class="col-md-12 d-flex flex-column gap-4">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <p class="bold">Название</p>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="name" value="<?php echo $room["name"]?>" required></input>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <p class="bold">Цена</p>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="number" min=0 name="price" value="<?php echo $room["price"]?>" required></input>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <p class="bold">Описание</p>
            </div>
            <div class="col-md-3">
                <textarea class="form-control" name="description" max=255 required><?php echo $room["description"]?></textarea>
            </div>
            <div class="col-md-3"></div>
        </div>
        
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <p class="bold">Ответсвенный сотрудник</p>
            </div>
            <div class="col-md-3">
                <select class="form-select" name="employer_id" required>
                    <?php
                        foreach ($employees as $key => $value) {
                            $selected = $value["id"]==$room["employer_id"]?"selected":"";
                            ?>
                            <option value="<?php echo $value["id"] ?>" <?php echo $selected ?>><?php echo $value["name"] ?></option>;
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <input type="submit" class="btn btn-primary text-white w-100" value="Сохранить"></input>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <a href="./room?id=<?php echo $_GET["id"]?>">Отменить</input>
            </div>
            <div class="col-md-3"></div>
        </div>
        <input type="number" name="id" value=<?php echo $_GET["id"]?> hidden>

    </form>
</div>