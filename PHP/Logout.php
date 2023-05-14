<?php
session_start();
session_destroy();
setcookie('user','',time());
setcookie('password','',time());
setcookie('checked','',time());
header("Location:/index.php");
?>