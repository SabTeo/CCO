<?php require_once 'dbConnection.php';
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo'noPOST';
        header('Location: /');
    }
    else {
        $dbconn =  dbconnect();
    }
    if ($dbconn) {
        $t = $_POST['type'];
        switch($t){
            //handler per richieste Type=VER_U/VER_E (verifica username o mail)
            case 'VER_U':
                $user = $_POST['username'];
                $q = 'select * from users where nome = $1';
                $result = pg_query_params($dbconn, $q, array($user));
                if (pg_fetch_array($result, null, PGSQL_ASSOC)) echo 'TAKEN_U';
                else echo 'FREE_U';
            break;
            case 'VER_E':
                $mail = $_POST['mail'];
                $q = 'select * from users where email = $1';
                $result = pg_query_params($dbconn, $q, array($mail));
                if (pg_fetch_array($result, null, PGSQL_ASSOC)) echo 'TAKEN_E';
                else echo 'FREE_E';
            break;
            //handler per richieste Type=REG (registrazione con dati validati)
            case 'REG':
                $user = $_POST['username'];
                $mail = $_POST['mail'];
                $password = $_POST['inputPassword'];
                $result = pg_insert($dbconn, 'users', array('nome'=>$user, 'email'=>$mail, 'paswd'=>$password));
                if($result==true){
                    echo 'SUCCESS';
                }
                else{
                    echo 'ERROR';
                }
            break;
        }
        return;
                /*
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
                        $remember=$_POST['remember'];
                        //ricordami
                        if(array_key_exists('remember', $_POST)){
                                setcookie('user', $user, time()+3600*24*7, "/");
                                setcookie('password',$password, time()+3600*24*7, "/");
                                echo "LOGIN_SUCCESSFUL";
                                return;
                        }
                    }
                        /*else {
                            setcookie('user',$user,3);
                            setcookie('password',$password,3);
                        }*/
                        //header("Location:../main.php");
    }
?>