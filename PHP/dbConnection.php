<?php
    function dbconnect(){
        $connection = pg_connect("host=localhost
                                    port=5432
                                    dbname=ccodb
                                    user=ltw
                                    password=snap")
        or die('Could not connect:' . pg_last_error());
        return $connection;
    }

    function getValuta($connection, $username){
        $query = "SELECT valuta FROM users WHERE nome = \$1";
        $result = pg_query_params($connection, $query, array($username)) or die('Query failed:' . pg_last_error ());
        $tuple = pg_fetch_array($result, null, PGSQL_ASSOC);
        return $tuple['valuta'];
    }

    function giftClaimed($connection, $username){
        $query = "SELECT lastgift FROM users WHERE nome = \$1";
        $result = pg_query_params($connection, $query, array($username)) or die('Query failed:' . pg_last_error ());
        $tuple = pg_fetch_array($result, null, PGSQL_ASSOC);
        //nessun regalo precedente
        if(empty($tuple['lastgift'])){
            date_default_timezone_set('Europe/Rome');
            $d = date('Y-m-d');
            $v = getValuta($connection, $username) + 100;
            pg_update($connection, 'users', array('lastgift'=>$d, 'valuta'=>$v), array('nome'=>$username));
            return false;
        }
        //data  diversa da quella odierna
        else if($tuple['lastgift']!=date('Y-m-d')){
            $d = date('Y-m-d');
            $v = getValuta($connection, $username) + 100;
            pg_update($connection, 'users', array('lastgift'=>$d, 'valuta'=>$v), array('nome'=>$username));
            return false;
        }
        return true;
    }
?>