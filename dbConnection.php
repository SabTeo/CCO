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
?>