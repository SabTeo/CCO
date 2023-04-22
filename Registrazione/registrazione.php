<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /");
}
else {
    $dbconn = pg_connect("host=localhost port=5432 dbname=ccodb
                user=ltw password=snap") 
                or die('Could not connect: ' . pg_last_error());
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            if ($dbconn) {
                $email = $_POST['inputEmail'];
                $q1="select * from Users where email= $1";
                $result=pg_query_params($dbconn, $q1, array($email));
                if ($tuple=pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    echo "<h1> Spiacente, l'indirizzo email e' già in uso</h1>
                        <a href=main.html> Riprova </a> con uno nuovo o
                        <a href=../Login/main.php> esegui il login</a>";
                }
                else {
                    $nome = $_POST['inputName'];
                    $password = $_POST['inputPassword'];
                    $q2 = "insert into Users values ($1,$2,$3)";
                    $data = pg_query_params($dbconn, $q2,
                        array($email, $nome, $password));
                    if ($data) {
                        //parte di ricordami
                        $remember=$_POST['remember'];
                        if (!empty($_POST['remember'])) {
                            setcookie('email',$email,time()+3600*24*7,'/');
                            setcookie('password',$password,time()+3600*24*7,'/');
                            setcookie('box',$remember,time()+3600*24*7,'/');
                        }
                        //fine parte ricordami
                        echo "<h1> Registrazione completata. <br/></h1>";
                        echo "<a href=../Login/main.php> Clicca qui </a>
                            per eseguire il login!";
                    }
                }
            }
        ?> 
    </body>
</html>