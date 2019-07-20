<?php
    require_once '../model/Transaction.php';
    Class TransactionController
    {
        public function insert(){
            Transaction::insert();
            unset($_SESSION["cart"]);
        }    
    }