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
            <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="login.php" style="float:right"><button type="button" class="btn btn-primary">sign in</button></a>
            </form>
        </div>
    </div>
</body>
