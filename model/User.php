<?php

    require_once '../utility/UuidGenerator.php';
    require_once '../database/Connect.php';
    Class User
    {
        public static function find($data){
            $connection = Connect::createConnection();
            $password = md5($data['password']);
            $query = "SELECT id,username,password FROM users WHERE username='".$data['username']."' AND password = '".$password."'";
            $result = $connection->query($query);
            
            $data = [];
            if($result){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }

            return $data;
        }

        public static function insert(){
            $connection = Connect::createConnection();
            $id = UuidGenerator::generateUuid();

            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i:s');
            $user_id = "32bb92a0-cb73-472e-953f-8eb681a292d5";

            $query = "INSERT INTO header_transaction(id,transaction_date,user_id,created_at) VALUES('".$id."','".$date."','".$user_id."','".$date."')";
            $result = $connection->query($query);

            for($i=0;$i<count($_SESSION['cart']);$i++){
                $cart = $_SESSION['cart'][$i];
                $query = "INSERT INTO detail_transaction(transaction_id,voucher_detail_id,quantity,created_at) VALUES('".$id."','".$cart['voucher_type_id']."','".$cart['quantity']."','".$date."')";
                $result = $connection->query($query);
            }
            
            return $result;
        }
    }