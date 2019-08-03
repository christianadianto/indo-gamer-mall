<?php

    require_once '../utility/UuidGenerator.php';
    require_once '../database/Connect.php';
    Class User
    {

        public static function all(){
            $connection = Connect::createConnection();
            $query = "SELECT id,username,deleted_at FROM users WHERE roles = 'customer'";
            $result = $connection->query($query);
            
            $data = [];
            if($result){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            return $data;
        }

        public static function find($data){
            $connection = Connect::createConnection();
            $password = md5($data['password']);
            $query = "SELECT id,username,password,roles FROM users WHERE username='".$data['username']."' AND password = '".$password."' AND deleted_at IS NULL";
            $result = $connection->query($query);
            
            $data = [];
            if($result){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }

            if(count($data)>0){
                return $data[0];
            }
            return $data;
        }

        public static function checkUsername($username){
            $connection = Connect::createConnection();
            $query = "SELECT id,username,password,roles FROM users WHERE username='".$username."' AND deleted_at IS NULL";
            $result = $connection->query($query);
            
            $data = [];
            if($result){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }

            if(count($data)>0){
                return $data[0];
            }
            return $data;
        }

        public static function insert($data){
            $connection = Connect::createConnection();
            $id = UuidGenerator::generateUuid();

            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i:s');
            $username = $data['username'];
            $password =  md5($data['password']);

            
            $query = "INSERT INTO users(id,username,password,roles,created_at) VALUES('".$id."','".$username."','".$password."','customer','".$date."')";
            $result = $connection->query($query);
            
           return $id;
        }

        public static function disable($id){
            $connection = Connect::createConnection();
            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i:s');

            $query = "UPDATE users SET deleted_at = '".$date."' WHERE id = '".$id."'";
            $connection->query($query);
        }
    }