<!DOCTYPE html>
<html lang="it">
<head>
    <title>Pagina di login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./signin.css" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
    <script src="./rememberMe.js" type="application/javascript"></script>
</head>
<body class="text-center">
    <form name="myForm" action="login.php" method="POST"
            class="form-signin m-auto" onsubmit="alertRmb()">
        <h1 class="mb-3">Esegui il login!</h1>
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
        <button type="submit" class="btn btn-primary">Invia!</button>
    </form>
</body>
</html>