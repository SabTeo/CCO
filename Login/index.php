<!DOCTYPE html>
<html>
    <head>
        <title>Carte Collezionabili Online</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="apple-touch-icon" sizes="180x180" href="Icon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="Icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Icon/favicon-16x16.png">
        <link rel="stylesheet" href="main.css"/>
        <link rel="stylesheet" href="index.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <script type="application/javascript" src="./bootstrap/js/bootstrap.min.js">
        </script>                                                                                                                                                                       
    </head>
    <body>
        <div class="col">
            <img class="logo" src="Assets/cards.svg" width="150" height="100">
            <h1 class="celem title"><b>Carte Collezionabili Online</b></h1>

            <form name="myForm" class="celem" action="login.php" method="POST"
                class="form-signin m-auto" onsubmit="alertRmb()">
                <input type="email" placeholder="Indirizzo e-mail" name="inputEmail"
                    class="form-control" required autofocus 
                    value= <?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];};?>>
                <input type="password" placeholder="Password" name="inputPassword"
                    class="form-control" required
                    value=<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];};?>>
                <div id="divRemember" class="checkbox mb-2">
                <input type="checkbox" name="remember" id="rmb"
                    checked=<?php if(isset($_COOKIE['remember'])){echo "checked";};?>>
                <label for="rmb">Ricordami</label>
                </div>
                <a class="celem btn btn-primary btn-lg gradientbutton"type="submit">Login</a><br>
            </form>

            <a class="celem" href="Registrazione/main.html">Crea un account</a>
        </div>
    </body>
</html>
