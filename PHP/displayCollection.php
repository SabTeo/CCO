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
                $ordine=$_POST['order'];
                $q1="select id,nomecarta,rarita,1 as posseduta 
                from possiede join carte on(id=cardid) 
                where username=$1 ";
                if($_POST["check"]=="true"){
                    $q2="union 
                    (select id,nomecarta,rarita,0 as posseduta     
                    from carte 
                    except 
                    select id,nomecarta,rarita,0 as posseduta 
                    from possiede join carte on(id=cardid) 
                    where username=$1) ";
                    $q1=$q1 . $q2;
                }
                $q1=$q1 . $rigafinale;
                $q1=$q1 . $ordine;
                $q1=$q1 . ',id';
                $result = pg_query_params($dbconn, $q1,array($utente));
                $tuple=pg_fetch_array($result, null, PGSQL_ASSOC);
                $pos = 0;
                $queue = 0;
                echo"<div class=\"grid-cont\">";
                while($tuple!=false){
                    $nome=$tuple['nomecarta'];
                    $id=$tuple['id'];
                    $p=$tuple['posseduta'];
                    $rar=$tuple['rarita'];
                    if($p==1){
                        echo"<div class=\"preview\" id=$id>
                            <div class=\"card-container-prev initialpos\" id=\"$id\"
                                data-position=\"$pos\" data-queue=\"$queue\" data-rarity=\"$rar\">  
                                <div class=\"card-content\">";
/*abbinmamento immagine--->*/   echo "<img src=\"Assets/Images/".$id.".png\" class=\"previmg\">
                                </div>
                            </div>
                        </div>
                    ";
                    $pos++;
                    }
                    else{
                        echo"<div class=\"preview\" id ='cc'>
                        <div class=\"card-container-prev initialpos\" id=\"$id\"
                            data-queue=\"$queue\" style=\"pointer-events: none\"> 
                        <div class=\"shadow\"></div> 
                            <div class=\"card-content\">";
/*abbinmamento immagine--->*/   echo "<img src=\"Assets/Images/".$id.".png\" class=\"previmg\">
                            </div>
                        </div>
                    </div>
                    ";
                    }
                $tuple=pg_fetch_array($result, null, PGSQL_ASSOC);
                $queue++;
                }
                echo"<script>
                setMaxIndex($pos-1);
                setMaxQueue($queue-1);
                $(document).ready(function(){
                    $(\".card-container-prev\").click(function(){
                        setIndex(this.dataset.position);
                        loadCarta(this.id);
                    });
                });
                displayAnim(-1);
                </script>";
                echo"</div>";
            }
        ?> 
    </body>
</html>