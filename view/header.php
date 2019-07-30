<?php
    
    session_start();
    $username = "";
    $roles = "guest";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user']['username'];
        $roles = $_SESSION['user']['roles'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Indo Gamer Mall</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">

    <script src="../asset/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
    <script src="../asset/js/bootstrap.min.js.map"></script>
    <script src="../asset/fontawesome/js/all.min.js"></script>
    
</head>
<body>
    <div class="wrapper content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../view/index.php">IndoGamerMall</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../view/index.php">Home</a>
                </li>
                <?php
                    if($roles!="guest"){
                ?>
                <li>
                    <a class="nav-link" href="../view/transaction.php">Transaction</a>
                </li>
                <?php
                    }
                ?>
            </ul>
            <a href="cart.php"><button class="btn btn-outline-dark mr-2"><i class="fas fa-shopping-cart"></i></button></a>
            <?php 
                if($roles=="guest"){
            ?>
            <a href="login.php"><button class="btn btn-outline-primary">sign in</button></a>
            <?php
                }
                else{
            ?>
            <span style="padding-right:10px">Hello, <?=$username?></span>
            <a href="../controller/SignoutController.php"><button class="btn btn-outline-primary">sign out</button></a>
            <?php
                }
            ?>
        </div>
        </nav>
