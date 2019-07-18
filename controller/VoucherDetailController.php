<?php
    require_once '../model/VoucherDetail.php';

    class VoucherDetailController
    {
        public function index(){
            return VoucherDetail::all();
        }

        public function get($id){
            return VoucherDetail::find($id);
        }

        public function store(){

        }

        public function update(){

        }

        public function delete(){

        }
    }

?>