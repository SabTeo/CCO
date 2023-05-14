<?php

    $dbconn = pg_connect("host=localhost port=5432 dbname=Progetto_db
    user=postgres password=220400") 
                or die('Could not connect: ' . pg_last_error());

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
                $nome=$tuple['nomecarta'];
                echo"<div>$nome</div>";
            }
        ?> 
    </body>
</html>