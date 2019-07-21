<?php

    require_once '../model/User.php';
    Class RegisterController
    {   
        public function register($data){
            if(trim($data['username']) == ""){
                $_SESSION['err'] = "username must be filled";
                return;
            }
            if(trim($data['password']) == ""){
                $_SESSION['err'] = "password must be filled";
                return;
            }

            $user = User::checkUsername($data['username']);
            if($user){
                $_SESSION['err'] = "username already taken";
                return;
            }

            $result = User::insert($data);

            $_SESSION['user']=[
                'user_id'=>$result,
                'username'=>$data['username'],
                'roles'=>'customer',
            ];

            header('Location:index.php');

        }
    }