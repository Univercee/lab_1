<?php

class EmployeesController {
    private $table;
    private $errors;
    public function __construct()
    {
        $this->table = new Employer();
        $this->errors = [];
    }
    public function get(int $id){
        $room = $this->table->get($id);
        return $room;
    }

    public function getAll(){
        $rooms = $this->table->getAll();
        return $rooms;
    }
}

?>