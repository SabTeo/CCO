<?php require_once '../PHP/dbConnection.php';
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: /");
    }
    else {
        $dbconn =  dbconnect();
    }
    if ($dbconn) {
        $email = $_POST['inputEmail'];
        $q1 = "select * from Users where email= $1";
        $result = pg_query_params($dbconn, $q1, array($email));
        if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
            echo "<h1>Non esiste una mail associata a questa password/a</h1>
                <a href=main.html>Riprova </a> o
                <a href=../Registrazione/main.html> Registrati</a>";
        }
        else {
            $password = $_POST['inputPassword'];
            $q2 = "select * from Users where email = $1 and paswd = $2";
            $result = pg_query_params($dbconn, $q2, array($email,$password));
            if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                echo "<h1> La password e' sbagliata! </h1>
                    <a href=main.html> Clicca qui per riprovare </a>";
            }
            else {
                session_start();
                $_SESSION['username']=$email;
                $nome=$tuple['nome'];
                $remember=$_POST['remember'];
                //parte di ricordami
                if (!empty($_POST['remember'])) {
                    setcookie('email',$email,time()+3600*24*7);
                    setcookie('password',$password,time()+3600*24*7);
                    setcookie('box',$remember,time()+3600*24*7);
                } else {
                    setcookie('email',$email,3);
                    setcookie('password',$password,3);
                    setcookie('box',$remember,3);
                } 
                //fine parte ricordami
                header("Location:../main.php");
                    }
                }
            }
?>