<?php

    require_once '../database/Connect.php';
    
    class VoucherDetail
    {

        public static function all($id){
            $connection = Connect::createConnection();

            $query = "SELECT * FROM voucher_details where voucher_id = '".$id."'";
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

            $query = "SELECT * FROM voucher_details where id = '".$id."'";
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