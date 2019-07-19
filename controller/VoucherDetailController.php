<?php
    require_once '../model/VoucherDetail.php';

    class VoucherDetailController
    {
        public function index($id){
            return VoucherDetail::all($id);
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