<?php
    require_once '../controller/LoginController.php';
    require '../middleware/guest.php';
   
    $err="";
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
        $login_controller = new LoginController();
        $remember = false;
        if(isset($_POST['remember'])){
            $remember = $_POST['remember'];
        }
        $data = [
            'username'=>$_POST['username'],
            'password'=>$_POST['password'],
            'remember'=>$remember
        ];
      
        $login_controller->login($data);
        if(isset($_SESSION['err'])){
            $err = $_SESSION['err'];
            session_unset();
        }
    }
    $username="";
    $password="";
    if(isset($_COOKIE['username'])){
        $username = $_COOKIE['username'];
        $password = $_COOKIE['password'];
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

    <script src="../asset/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
    <script src="../asset/js/bootstrap.min.js.map"></script>
    <script src="../asset/fontawesome/js/all.min.js"></script>
    
    <style>
        html,body {
            height:100%;
            width:100%;
            margin:0;
        }
        body {
            display:flex;
            background-color:#f8f9fa;
        }
        .login-section{
            margin:auto
        }
        .login-container{
            border: black 1px solid;
            padding: 10px;
            background-color:#f1f1f1;
            border-radius: 5%;
            box-shadow:0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important
        }
    </style>
</head>

<body>
    <div class="login-section">
        <div class="login-container container">
            <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?=$username?>" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?=$password?>" placeholder="Password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" value="true" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember Me!</label>
            </div>
            <?php
                    if($err != ""){
                        ?>
                        <div class="form-group">
                            <small id="emailHelp" style="color:red"><?=$err?></small>
                        </div>
                        <?php
                        $err = "";
                    }
                ?>
            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            <a href="register.php" style="float:right"><button type="button" class="btn btn-primary">sign up</button></a>
            </form>            
        </div>
    </div>
</body>
