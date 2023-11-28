<?php

class UserController {
    private $table;
    private $errors;
    public function __construct()
    {
        $this->table = new User();
        $this->errors = [];
    }

    public function add(string $login, string $password, string $password_verification){
        $this->errors = [];

        if(empty($login) || empty($password) || empty($password_verification)){
            array_push($this->errors, 'Не все поля заполнены');
        }
        if($password != $password_verification){
            array_push($this->errors, 'Пароли не совпадают');
        }
        if($this->table->checkLoginExist($login)){
            array_push($this->errors, 'Пользователь с такой почтой уже существует');
        }

        if(!preg_match("/^[a-zA-Z\d!@#$%^&*(),.?\"':{}|<>]*[a-zA-Z][a-zA-Z\d!@#$%^&*(),.?\":{}|<>]*$/", $password)){
            array_push($this->errors, 'Разрешены только латинкие буквы');
        }
        if(!preg_match("/^.{6,}$/u", $password)){
            array_push($this->errors, 'Пароль должен содержать хотя бы 6 символов');
        }
        if(!preg_match("/^(?=.*[A-Z]).+$/", $password)){
            array_push($this->errors, 'Пароль должен содержать заглавную латинскую букву');
        }
        if(!preg_match("/[!@#$%^&*(),.?\"':{}|<>]/", $password)){
            array_push($this->errors, 'Пароль должен содержать спецсимвол');
        }
        if(!preg_match("/\d/", $password)){
            array_push($this->errors, 'Пароль должен содержать цифру');
        }
        if(empty($this->errors)){
            $this->table->create($login, password_hash($password, PASSWORD_DEFAULT));
        }
        return $this->errors;
        
    }

    public function getByToken(string $token){
        $user = $this->table->getByToken($token);
        return $user;
    }

    public function login(string $login, string $password){
        $this->errors = [];
        $user = null;
        $session_token = null;

        if(empty($login) || empty($password)){
            array_push($this->errors, 'Не все поля заполнены');
        }
        if(empty($this->errors)){
            $user = $this->table->getId($login, $password);
            if(empty($user)){
                array_push($this->errors, 'Логин или пароль введены неверно');
            }
            else{
                $session_token = $this->table->createSessionToken($user["id"]);
            }
        }
        return ["errors"=>$this->errors, "session_token"=>$session_token];
    }

    public function edit(string $name = null, int $sex = null, string $birthday_timestamp = null, string $address = null,
                        string $description = null, string $vk_link = null, int $blood_type = null, int $rh_factor = null){

        $this->errors = [];
        $id = $this->table->getIdByToken($_COOKIE['session_token']);
        
        try{
            $this->table->edit($id, $name, $sex, $birthday_timestamp, $address, $description, $vk_link, $blood_type, $rh_factor);
        }catch(Exception $e){
            array_push($this->errors, 'Не удалось обновить профиль');
        }
        finally {
            return $this->errors;
        }
    }

    public function delete($id){

    }


    public function uploadImage($image) {
        $id = $this->table->getIdByToken($_COOKIE['session_token']);
        $img_name = $id.".jpg";
        $allowed_types = ['png', 'jpg'];
        $path = $_SERVER['DOCUMENT_ROOT'].'/Lr/inc/catalog_images/users/'.$id.'.jpg';
        try {
            if(is_null($image)){
                $this->table->deleteImage($id);
                if(file_exists($path)){
                    unlink($path);
                }
            }
            else{
                $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
                if(!in_array($ext, $allowed_types)){
                    throw new Exception();
                }
                move_uploaded_file($image["tmp_name"], $path);
                $this->table->uploadImage($id, $img_name);
            }
        }
        catch(Exception $e){
            array_push($this->errors, 'Не удалось загрузить фотографию');
        }
        finally {
            return $this->errors;
        }
    }
}

?>