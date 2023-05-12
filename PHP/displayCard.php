<?php require_once 'dbConnection.php';
    $dbconn = dbconnect();
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            if ($dbconn) {
                $id= $_POST['id'];
                $q1 = "select * from carte where id= $1";
                $result = pg_query_params($dbconn, $q1, array($id));
                $tuple=pg_fetch_array($result, null, PGSQL_ASSOC);
                $id=$tuple['id'];
                $nome=$tuple['nomecarta'];
                $desc=$tuple['descrizione'];
                echo"<h1>$id<h1>";
                echo"<h1>$nome<h1>";
                echo"<div>$desc</div>";
            }
        ?> 
    </body>
</html>