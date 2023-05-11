<?php session_start(); //dichiara variabile $_SESSION per questa pagina (inizializzata al login!)
    //isUserLogged();
    //if not redirect to login
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Collezione</title>
<script defer src="collezione.js"></script> 
<link rel="stylesheet" href="collezione.css"/>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="dropdown">
    <button class="dropbtn">Ordina per</button>
    <div class="dropdown-content">
      <div id="default">ID</div>
      <div id="nome">Nome</div>
    </div>
</div>
<div>
    <form>
        <input type="checkbox" id="checco">
        <label for="checco">Mostra non possedute</label>
    </form>
</div>
<div id="zonaCarte">
    Seleziona il documento da visualizzare
</div>
<hr/>
<div id="zonaDisplay">
Seleziona la carta
</div>
<script>
$(document).ready(function(){
      DisplayCollezione("default"); 
      $("#default").click(function(){DisplayCollezione('default')});
      $("#nome").click(function(){DisplayCollezione('nome')});
      $("#checco").click(function(){cambiastatocheck()});
    
});
</script>
</body>
</html>