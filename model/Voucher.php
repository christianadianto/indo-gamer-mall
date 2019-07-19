<?php

    require_once '../database/Connect.php';
    
    class Voucher
    {

        public static function all(){
            $connection = Connect::createConnection();

            $query = "SELECT * FROM vouchers";
            $result = $connection->query($query);
            
            $data = [];
            if($result){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
           
            return $data;
        }

        public static function find($id){
            $connection = Connect::createConnection();

            $query = "SELECT * FROM vouchers where id = '".$id."'";
            $result = $connection->query($query);
            
            $data = [];
            if ($result){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            
            if(count($data)>0){
                return $data[0];
            }
            return $data;
        }
    }

?>