<?php

    require_once '../utility/UuidGenerator.php';
    require_once '../database/Connect.php';
    Class Transaction
    {
        public static function insert(){
            $connection = Connect::createConnection();
            $id = UuidGenerator::generateUuid();

            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i:s');
            $user_id = $_SESSION['user']['user_id'];

            $query = "INSERT INTO header_transaction(id,transaction_date,user_id,created_at) VALUES('".$id."','".$date."','".$user_id."','".$date."')";
            $result = $connection->query($query);

            for($i=0;$i<count($_SESSION['cart']);$i++){
                $cart = $_SESSION['cart'][$i];
                $query = "INSERT INTO detail_transaction(transaction_id,voucher_detail_id,quantity,created_at) VALUES('".$id."','".$cart['voucher_type_id']."','".$cart['quantity']."','".$date."')";
                $result = $connection->query($query);
            }
            
            return $result;
        }

        public static function find($username){
            $connection = Connect::createConnection();

            $user_id = $_SESSION['user']['user_id'];

            $query = "SELECT ht.id,transaction_date,status,username FROM header_transaction ht JOIN users u ON ht.user_id = u.id WHERE u.id = '".$user_id."'";
            $header = $connection->query($query);

            $query = "SELECT dt.transaction_id,type,quantity,price FROM detail_transaction dt JOIN voucher_details vd ON vd.id = dt.voucher_detail_id";
            $detail = $connection->query($query);
            
            $result = self::combine($header, $detail);
            return $result;
        }

        public static function all(){
            $connection = Connect::createConnection();

            $user_id = $_SESSION['user']['user_id'];

            $query = "SELECT ht.id,transaction_date,status,username FROM header_transaction ht JOIN users u ON ht.user_id = u.id";
            $header = $connection->query($query);

            $query = "SELECT dt.transaction_id,type,quantity,price FROM detail_transaction dt JOIN voucher_details vd ON vd.id = dt.voucher_detail_id";
            $detail = $connection->query($query);
            
            $result = self::combine($header, $detail);
            return $result;
        }

        private function combine($headers, $details){
            $result = [];
            foreach($headers as $i=>$header){
                $result[$i]=[
                    'id'=>$header['id'],
                    'date'=>$header['transaction_date'],
                    'status'=>$header['status'] == 0 ? 'not approved':'approved',
                    'username'=>$header['username']
                ];
                foreach($details as $j=>$detail){
                    if($header['id']==$detail['transaction_id']){
                        $data_detail = [
                            'transaction_id'=>$detail['transaction_id'],
                            'voucher'=>$detail['type'],
                            'qty'=>$detail['quantity'],
                            'price'=>$detail['price']
                        ];
                        $result[$i]['detail'][$j] = $data_detail; 
                    }
                }
            }

            return $result;
        }

    }