<?php
    
    $auth = false;
    if(isset($_COOKIE['session_token'])){
        $user = (new UserController())->getByToken($_COOKIE['session_token']);
        if($user){
            $auth = true;
        }
    }

?>