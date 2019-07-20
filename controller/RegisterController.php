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

            $user = User::find($data);
            if(count($user)==0){
                $_SESSION['err'] = "wrong username/password";
                return;
            }

            $_SESSION['user']=[
                'user_id'=>$user['id'],
                'username'=>$user['username'],
                'roles'=>$user['roles'],
            ];

            header('Location:index.php');

        }
    }