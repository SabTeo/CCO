<?php require_once "dbConnection.php";
       $dbconn = dbconnect();
       session_start();
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            if ($dbconn) {
                $utente=$_SESSION['username'];
                $rigafinale=$_POST['sort'];
                $q1="select id,nomecarta,1 as posseduta 
                from possiede join carte on(id=cardid) 
                where username=$1 ";
                if($_POST["check"]=="true"){
                    $q2="union 
                    (select id,nomecarta,0 as posseduta     
                    from carte 
                    except 
                    select id,nomecarta,0 as posseduta 
                    from possiede join carte on(id=cardid) 
                    where username=$1) ";
                    $q1=$q1 . $q2;
                }
                $q1=$q1 . $rigafinale;

                $result = pg_query_params($dbconn, $q1,array($utente));
                $tuple=pg_fetch_array($result, null, PGSQL_ASSOC);
                echo"<div class=\"grid-cont\">";
                while($tuple!=false){
                    $nome=$tuple['nomecarta'];
                    $id=$tuple['id'];
                    echo"<div class=\"grid-item\" id=\"$id\">$nome</div>";
                    $tuple=pg_fetch_array($result, null, PGSQL_ASSOC);
                } 
                echo"<script>$(document).ready(function(){
                    $(\".grid-item\").click(function(){
                        $(\"#zonaDisplay\").load(\"DisplayCard.php\",{id:this.id},
                        function(responseTxt, statusTxt, xhr){
                            if(statusTxt == \"error\")
                                alert(\"Errore\" + xhr.status + \":\" + xhr.statusText);
                        });
                    });
                });</script>";
                echo"</div>";
            }
        ?> 
    </body>
</html>