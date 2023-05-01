<?php
    if(array_key_exists('user', $_COOKIE)){
            if(isset($_COOKIE['user'])){
                $user = $_COOKIE['user'];
                session_start();
                $_SESSION['username']= $user;
            header("Location: /main.php");
        }
    } 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Carte Collezionabili Online - Login</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="apple-touch-icon" sizes="180x180" href="Icon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="Icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Icon/favicon-16x16.png">
        <link rel="stylesheet" href="CSS/main.css"/>
        <link rel="stylesheet" href="CSS/index.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <script src="JS/jquery-min.js"></script>   
        <script defer src="JS/login.js"></script>                                                                                                                                                                   
    </head>
    <body>
        <div class="mainContainer">
            <div class="box">
                <img class="logo" src="Assets/cards.svg" width="130" height="90">
                <h1 class="title"><b>Carte Collezionabili Online</b></h1>
                <div class="invalid-message"></div>
                <form name="myForm" id="form" action="PHP/login.php" onsubmit="return login()" method="POST"
                        class="form-signin needs-validation">
                    <input type="text" placeholder="Username" name="Username"
                        class="form-control" title="" id="userfield"
                        required autofocus>
                    <input type="password" placeholder="Password" name="inputPassword"
                        class="form-control" title="" id="passwordfield"
                        required>
                    <div id="divRemember" class="checkbox">
                        <input type="checkbox" class="form-check-input" name="remember" id="rmb">
                        <label for="rmb" id="rmbLabel">Ricordami</label>
                    </div>
                    <button class="btn btn-primary btn-lg gradientbutton" type="submit">Login</button>
                </form>
                <a class="celem" href="register.php">Crea un account</a>
            </div>

        </div>
    </body>
</html>
