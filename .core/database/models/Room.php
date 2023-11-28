<?php

class Room {

    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function create($name, $description, $price, $employer_id){
        $query = $this->pdo->prepare("INSERT INTO `rooms`(name, description, price, employer_id) VALUES(:name, :description, :price, :employer_id)");
        $executed = $query->execute([':name' => $name, ':description' => $description, ':price' => $price, ':employer_id' => $employer_id]);
        if(!$executed){
            throw new PDOException();
        }
        $id = $this->pdo->lastInsertId();
        return $id;
    }

    public function get($id){
        $query = $this->pdo->prepare("SELECT `rooms`.*, `employees`.name AS 'employer', `employees`.id AS 'employer_id' FROM `rooms` 
                                    LEFT JOIN `employees` ON `employees`.id = `rooms`.employer_id
                                    WHERE `rooms`.id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $room = $query->fetch();
        return $room;
    }

    public function getAll(){
        $query = $this->pdo->prepare("SELECT `rooms`.*, `employees`.name AS 'employer', `employees`.id AS 'employer_id' FROM `rooms`
                                    LEFT JOIN `employees` ON `employees`.id = `rooms`.employer_id");
        $query->execute();
        $rooms = $query->fetchAll();
        return $rooms;
    }

    public function edit($id, $name, $description, $price, $employer_id){
        $query = $this->pdo->prepare("UPDATE `rooms`
                                    SET name = :name, description = :description, price = :price, employer_id = :employer_id
                                    WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':price', $price);
        $query->bindParam(':employer_id', $employer_id);
        $executed = $query->execute();
        if(!$executed){
            throw new PDOException();
        }
    }

    public function delete($id){
        $query = $this->pdo->prepare("DELETE FROM `rooms` WHERE id = :id");
        $query->bindParam(':id', $id);
        $executed = $query->execute();
        if(!$executed){
            throw new PDOException();
        }
    }

    public function uploadImage($id, $img_name){
        $query = $this->pdo->prepare("UPDATE `rooms` SET image = :image WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':image', $img_name);
        $executed = $query->execute();
        var_dump($executed);
        if(!$executed){
            throw new PDOException();
        }
    }

    public function deleteImage($id){
        $query = $this->pdo->prepare("UPDATE `rooms` SET image = NULL WHERE id = :id");
        $query->bindParam(':id', $id);
        $executed = $query->execute();
        var_dump($executed);
        if(!$executed){
            throw new PDOException();
        }
    }
}

?>