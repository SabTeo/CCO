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
                $rar=$tuple['rarita'];
                echo"
                <div class=\"card-container\" id=$id onclick=\"flip()\">
                  <div class=\"card\" id=\"card-big\">
                    <div class=\"card-front\" id =\"card-front\">
                      <div class=\"card-fill\">
                        <div class=\"card-content-big\">
                          <img src=\"Assets/Images/".$id.".png\" class=\"previmg\">
                          <h4>$nome <hr> </h4>";
                          //carta di rarita 4 oppure no
        if($rar==4)echo   "<a href=$desc target=\"_blank\" rel=\"noopener noreferrer\">$desc</a>";
        else       echo   "<p>$desc</p>";
        echo           "</div>
                      </div>
                    </div>
                    <div class=\"card-back\">
                      <img src=\"Assets/sapienza.jpg\" 
                        class=\"back-image\"
                        alt=\"sapienza logo\">
                    </div>
                  </div>
                </div>
                ";
            }
        ?> 
    </body>
</html>