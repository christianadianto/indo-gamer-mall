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

        public function insert($data){
            // $voucher = $this->voucher_controller->get($data['voucher_id']);
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