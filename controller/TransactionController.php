<?php
    require_once '../model/Transaction.php';
    Class TransactionController
    {
        public function insert(){
            Transaction::insert();

            session_start();
            unset($_SESSION["cart"]);
        }    
    }