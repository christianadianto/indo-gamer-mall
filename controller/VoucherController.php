<?php
    require '../model/Voucher.php';

    class VoucherController
    {
        public function index(){
            return Voucher::all();
        }

        public function get($id){
            return Voucher::find($id);
        }

        public function store(){

        }

        public function update(){

        }

        public function delete(){

        }
    }

?>