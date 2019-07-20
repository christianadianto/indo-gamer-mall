<?php
session_start();
if(isset($_SESSION['user'])){
    return header('Location:../view/index.php');
}