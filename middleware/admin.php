<?php

session_start();

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    if($user['roles']!='admin'){
        return header('Location:../view/index.php');
    }
}
else{
    return header('Location:../view/index.php');
}