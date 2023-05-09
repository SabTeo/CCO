<!DOCTYPE html>
<html>
    <head>
        <title>Carte Collezionabili Online - Registrazione</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="apple-touch-icon" sizes="180x180" href="Icon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="Icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Icon/favicon-16x16.png">
        <link rel="stylesheet" href="CSS/main.css"/>
        <link rel="stylesheet" href="CSS/register.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <script src="JS/jquery-min.js"></script>   
        <script src="JS/register.js"></script>                                                                                                                                                                   
    </head>
    <body>
        <div class="mainContainer">
            <div class="box">
                <h1>Registrazione</h1>
                <form name="myForm" id="form" onsubmit="" method="POST"
                        class="form-signin needs-validation">
                    <input type="text" placeholder="Username" name="Username"
                        class="form-control" title="" id="userfield" size=""
                        onchange="return isUserValid()" required>
                    <div class="invalid-message" id="invUser"></div>
                    <input type="text" placeholder="Email" name="Email"
                        class="form-control" title="" id="mailfield"
                        onchange="return isMailValid()" required>
                    <div class="invalid-message" id="invMail"></div>
                    <input type="password" placeholder="Password" name="inputPassword"
                        class="form-control" title="" id="passwordfield"
                        onchange="return isPassValid()" required>
                    <div class="invalid-message" id="invPass"></div>
                    <button class="btn btn-primary btn-lg gradientbutton" type="submit">Registrati</button>
                </form>
                <div class="bottom">
                    hai già un account?
                    <a  href="index.php">accedi</a>
                </div>
                
            </div>

        </div>
    </body>
</html>
