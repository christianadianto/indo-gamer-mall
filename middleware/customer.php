<?php

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    if($user['roles']!='customer'){
        return header('Location:../view/index.php');
    }
}
else{
    return header('Location:../view/index.php');
}