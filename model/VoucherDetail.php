<?php

    require_once '../database/Connect.php';
    
    class VoucherDetail
    {

        public static function all(){
            $connection = Connect::createConnection();

            $query = "SELECT * FROM voucher_details";
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

            $query = "SELECT * FROM voucher_details where voucher_id = '".$id."'";
            $result = $connection->query($query);
            
            $data = [];
            if ($result){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
          
            return $data;
        }
    }

?>