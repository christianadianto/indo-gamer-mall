<?php

    require_once '../utility/UuidGenerator.php';
    require_once '../database/Connect.php';
    Class User
    {
        public static function find($data){
            $connection = Connect::createConnection();
            $password = md5($data['password']);
            $query = "SELECT id,username,password,roles FROM users WHERE username='".$data['username']."' AND password = '".$password."'";
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
            $password = $data['password'];
            
            $query = "INSERT INTO users(id,username,password,roles,created_at) VALUES('".$id."','".$username."','".$password."','customer','".$date."')";
            $result = $connection->query($query);
            return $result;
        }
    }