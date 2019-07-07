<?php

    require '../database/Connect.php';
    
    class Voucher
    {

        public static function all(){
            $connection = Connect::createConnection();

            $query = "SELECT * FROM vouchers";
            $result = $connection->query($query);

            // return $result;
            
            $data = [];
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }

?>