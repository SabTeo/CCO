<!DOCTYPE html>
<html lang='en'>
    <head></head>
    <body>
        <?php
           
            if(!isset($_COOKIE['name'])){
                echo "Benvenuto " . $_GET['name'];
                setcookie('name',$_GET['name'],time()+3600*24*7);
            }
            else if($_COOKIE['name']!=$_GET['name']){
                echo "Benvenuto " . $_GET['name'];
                setcookie('name',$_GET['name'],time()+3600*24*7);
            }
            else{
                echo "Bentornato " . $_COOKIE['name'];
            }
            
        ?>
    </body>
</html>