<?php
    require_once '../model/Transaction.php';
    Class TransactionController
    {
        public function insert(){
            Transaction::insert();
            unset($_SESSION["cart"]);
        }
        
        public function index(){
            if($_SESSION['user']['roles']=="admin")
                return Transaction::all();
            else
                return Transaction::find($_SESSION['user']['username']);
        }
    }