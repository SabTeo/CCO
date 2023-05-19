<?php require_once 'dbConnection.php';
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        echo"noPOST";
        header("Location: /");
    }
    else {
        $dbconn =  dbconnect();
    }
    if ($dbconn) {
        $user = $_POST['username'];
        $q1 = "select * from users where nome= $1";
        $result = pg_query_params($dbconn, $q1, array($user));
        if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
            echo "INVALID_NAME";
            return;
        }
        else {
            $password = $_POST['inputPassword'];
            $q2 = "select * from users where nome = $1 and paswd = $2";
            $result = pg_query_params($dbconn, $q2, array($user, $password));
            if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                echo "INVALID_PASSWORD";
                return;
            }
            else {
                session_start();
                $_SESSION['username']=$user;
                //ricordami
                if(array_key_exists('remember', $_POST)){
                        setcookie('user', $user, time()+3600*24*7, "/");
                        setcookie('password',$password, time()+3600*24*7, "/");
                        echo "LOGIN_SUCCESSFUL";
                        return;
                }
            }
                echo "LOGIN_SUCCESSFUL";
        }
    }
?>