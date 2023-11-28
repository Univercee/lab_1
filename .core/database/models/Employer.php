<?php

class Employer {

    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }


    public function get($id){
        $query = $this->pdo->prepare("SELECT * FROM `employees` 
                                    WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $room = $query->fetch();
        return $room;
    }

    public function getAll(){
        $query = $this->pdo->prepare("SELECT * FROM `employees`");
        $query->execute();
        $rooms = $query->fetchAll();
        return $rooms;
    }
}

?>