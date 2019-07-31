<?php
    require_once '../model/Transaction.php';
    Class TransactionController
    {
        public function insert(){
            Transaction::insert();
            unset($_SESSION["cart"]);
        }
        
        public function index(){
            return Transaction::all();
        }

        public function update($id){
            Transaction::update($id);
            header('Location:../view/transaction.php');
        }
    }