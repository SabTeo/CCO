<?php session_start(); //dichiara variabile $_SESSION per questa pagina (inizializzata al login!)
    //isUserLogged();
    //if not redirect to login
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Collezione</title>
    <link rel="stylesheet" href="CSS/collezione.css"/>
    <link rel="stylesheet" href="CSS/main.css"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script defer src="JS/collezione.js"></script> 
</head>
<body>
    <div class="menu-bar">
      <div class="menu-item">
        <div class="btn">
          <img id="profile" src="Assets/account.svg" height="30px" width="30"> </img>
          <h3>Utente</h3>
        </div>
      </div>
      <div class="menu-item top-item">
        <h2>Collezione</h2>
      </div>
      <div class="menu-item">
        <div class="btn">
            <h3>Negozio</h3>
            <img id="cart" src="Assets/cart.svg" height="20px" width="20"> </object>
        </div>
      </div>
    </div>
    <div class="central">
        <nav class="options">
            <div class="dropdown">
                <button class="dropbtn">Ordina per</button>
                <div class="dropdown-content">
                  <div id="default">ID</div>
                  <div id="nome">Nome</div>
                </div>
            </div>
            <form class="check">
                <input type="checkbox" id="checco">
                <label for="checco">Mostra non possedute</label>
            </form>
        </nav>
        <div id="zonaCarte"></div>
        <script>
            $(document).ready(function(){
              DisplayCollezione("default"); 
              $("#default").click(function(){DisplayCollezione('default')});
              $("#nome").click(function(){DisplayCollezione('nome')});
              $("#checco").click(function(){cambiastatocheck()});
            });
        </script>

    </div>
    <!--
    <div id="zonaCarte">
    </div>
    <div id="zonaDisplay">
    </div>
    
    <script>
    $(document).ready(function(){
          DisplayCollezione("default"); 
          $("#default").click(function(){DisplayCollezione('default')});
          $("#nome").click(function(){DisplayCollezione('nome')});
          $("#checco").click(function(){cambiastatocheck()});
    });
    </script>
-->
</body>
</html>