<?php

    require_once '../model/User.php';
    Class UserController
    {   
        public function disable($id){
            User::disable($id);
        }

        public function all(){
            return User::all();
        }
    }