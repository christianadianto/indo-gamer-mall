<?php
    require '../model/Voucher.php';
    require '../model/VoucherDetail.php';

    Class CartController{
        public function insert($data){
            $voucherController = Voucher::find($data['']);  

            if(isset($_SESSION['cart'])){
                $total_item = count($_SESSION['cart']);
                for($i=0;$i<$total_item;$i++){
                    
                }
            }
            else{
                $_SESSION['cart'][0]=$data;
            }
            
        }
    }