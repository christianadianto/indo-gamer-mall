<?php

    require_once '../model/User.php';
    Class LoginController
    {   
        public function login($data){

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

            if($data['remember']){
                setcookie('username', $data['username'], time() + (86400 * 30), "/");
                setcookie('password', $data['password'], time() + (86400 * 30), "/");
            }

            header('Location:index.php');

        }
    }