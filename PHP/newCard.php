<?php require_once 'dbConnection.php';
    $username = $_GET['user'];
    $connection = dbconnect();
    //seleziona id non posseduti da utente e inserisce in un array
    $pool = array();
    $query = "SELECT id FROM carte EXCEPT SELECT cardid FROM possiede WHERE username=$1";
    $result = pg_query_params($connection, $query, array($username));
    $tuple=pg_fetch_array($result, null, PGSQL_ASSOC);
    if($tuple==false){
        echo'END';
        return;
    }
    while($tuple!=false){
        array_push($pool, $tuple['id']);
        $tuple=pg_fetch_array($result, null, PGSQL_ASSOC);
    }
    //sceglie casualmenter l'indice di un id nell'array e recupera la carta corrispondente all'id
    $newId = $pool[array_rand($pool)];
    $query = "SELECT * FROM carte WHERE id=$1";
    $result = pg_query_params($connection, $query, array($newId));
    $tuple=pg_fetch_array($result, null, PGSQL_ASSOC);
    $nome = $tuple['nomecarta'];
    $desc = $tuple['descrizione'];
    //update valuta e possessione nel database
    $v = getValuta($connection, $username) - 100;
    pg_update($connection, 'users', array('valuta'=>$v), array('nome'=>$username));
    pg_insert($connection, 'possiede', array('username'=>$username, 'cardid'=>$newId));
    echo"   <img src='Assets/Images/$newId.png' class='previmg'>
            <h4><b>$nome</b> <hr> </h4>";
    if($tuple['rarita']==4)echo "<a href=$desc target=\"_blank\" rel=\"noopener noreferrer\">$desc</a>";
    else echo "<p>$desc</p>";
?>