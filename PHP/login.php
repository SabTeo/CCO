<?php require_once '../PHP/dbConnection.php';
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: /");
    }
    else {
        $dbconn =  dbconnect();
    }
    if ($dbconn) {
        $user = $_POST['Username'];
        $q1 = "select * from users where nome= $1";
        $result = pg_query_params($dbconn, $q1, array($user));
        if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
            echo "<h1>errore utente:$user</h1>
                <a href=main.html>Riprova </a> o
                <a href=../Registrazione/main.html> Registrati</a>";
        }
        else {
            $password = $_POST['inputPassword'];
            $q2 = "select * from users where nome = $1 and paswd = $2";
            $result = pg_query_params($dbconn, $q2, array($user, $password));
            if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                echo "<h1> La password e' sbagliata! </h1>
                    <a href=main.html> Clicca qui per riprovare </a>";
            }
            else {
                session_start();
                $_SESSION['username']=$user;
                $nome=$tuple['nome'];
                $remember=$_POST['remember'];
                //ricordami
                if (!empty($_POST['remember'])) {
                    setcookie('user',$user,time()+3600*24*7);
                    setcookie('password',$password,time()+3600*24*7);
                    setcookie('box',$remember,time()+3600*24*7);
                } else {
                    setcookie('user',$user,3);
                    setcookie('password',$password,3);
                    setcookie('box',$remember,3);
                }
                header("Location:../main.php");
                    }
                }
            }
?>