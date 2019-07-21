<?php
    require_once '../controller/RegisterController.php';
    require '../middleware/guest.php';

    $err="";
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
        $register_controller = new RegisterController();

        $data = [
            'username'=>$_POST['username'],
            'password'=>$_POST['password'],
        ];
        $register_controller->register($data);
        if(isset($_SESSION['err'])){
            $err = $_SESSION['err'];
            session_unset();
        }
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
        .register-section{
            margin:auto
        }
        .register-container{
            border: black 1px solid;
            padding: 10px;
            background-color:#f1f1f1;
            border-radius: 5%;
            box-shadow:0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important
        }
    </style>

</head>

<body>
    <div class="register-section section">
        <div class="register-container container">
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
                <a href="login.php" style="float:right"><button type="button" class="btn btn-primary">sign in</button></a>
            </form>   
        </div>
    </div>
</body>
