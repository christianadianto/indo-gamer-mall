<?php
    require_once '../controller/VoucherController.php';
    require_once '../controller/VoucherDetailController.php';

    Class CartController{

        public $voucher_controller;
        public $voucher_detail_controller;
        
        public function __construct(){
            $this->voucher_controller = new VoucherController();
            $this->voucher_detail_controller = new VoucherDetailController();
        }

        public function remove($voucher_type_id){
            $carts = $_SESSION['cart'];
            foreach($carts as $key=>&$cart){
                if($cart['voucher_type_id']==$voucher_type_id){
                    if($cart['quantity']==1){
                        unset($carts[$key]);
                        break;
                    }
                    else{
                        $cart['quantity']-= 1;
                    }
                }
            }
            if(empty($carts)){
                unset($_SESSION['cart']);
            }
            else{
                $_SESSION['cart'] = $carts;
            }
        }

        public function clear($voucher_type_id){
            $carts = $_SESSION['cart'];
            foreach($carts as $key=>&$cart){
                if($cart['voucher_type_id']==$voucher_type_id){    
                    unset($carts[$key]);
                    break;
                }
            }
            if(empty($carts)){
                unset($_SESSION['cart']);
            }
            else{
                $_SESSION['cart'] = $carts;
            }
        }

        public function insert($data){
            if($data['quantity']==""){
                $_SESSION['err'] = "you need to input qty";
                return;
            }
            if($data['voucher_type_id']==""){
                $_SESSION['err'] = "you need to choose voucher type";
                return;
            }
            $voucher_detail = $this->voucher_detail_controller->get($data['voucher_type_id']);
                
            if(isset($_SESSION['cart'])){
                $total_item = count($_SESSION['cart']);
                for($i=0;$i<$total_item;$i++){
                    if($_SESSION['cart'][$i]['voucher_type_id'] == $data['voucher_type_id']){
                        $_SESSION['cart'][$i]['quantity'] += $data['quantity'];
                        return;        
                    }     
                }
                $_SESSION['cart'][$total_item] = [
                    'voucher_id' => $data['voucher_id'],
                    'type' => $voucher_detail['type'],
                    'voucher_type_id' => $voucher_detail['id'],
                    'quantity' => $data['quantity'],
                    'price' => $voucher_detail['price'],

                ];
            }
            else{
                $_SESSION['cart'][0]=[
                    'voucher_id' => $data['voucher_id'],
                    'type' => $voucher_detail['type'],
                    'voucher_type_id' => $voucher_detail['id'],
                    'quantity' => $data['quantity'],
                    'price' => $voucher_detail['price'],
                ];
            } 
        }
    }