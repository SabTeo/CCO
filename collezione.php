<?php
  session_start();
  if(!array_key_exists('username',$_SESSION)){
    if(array_key_exists('user', $_COOKIE)){
            if(isset($_COOKIE['user'])){
                $user = $_COOKIE['user'];
                $_SESSION['username']= $user;
        }
    } 
  else{header("Location:/index.php");}
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Collezione</title>
    <link rel="stylesheet" href="CSS/main.css"/>
    <link rel="stylesheet" href="CSS/collezione.css"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="JS/collezione.js"></script> 
</head>
<body>

    <div id='overlay' class="overlay hidden cover">
        <div id="zonaDisplay"></div>
    </div>
    <img id=esc class="hidden" src="Assets/esc.svg" height="38px" width="38"
          onclick="$('#overlay').toggleClass('hidden');
              $('#esc').toggleClass('hidden');
              $('body').removeClass('noScroll');">

    <div class="menu-bar">
      <div class="menu-item">
        <div class="btn" onclick="window.location='/PHP/Logout.php';">
          <img id="profile" src="Assets/account.svg" height="30px" width="30"> </img>
          <h3>Utente</h3>
        </div>
      </div>
      <div class="menu-item top-item">
        <h2>Collezione</h2>
      </div>
      <div class="menu-item">
        <div class="btn" onclick="window.location='store.php';">
            <h3>Negozio</h3>
            <img id="cart" src="Assets/cart.svg" height="20px" width="20">
        </div>
      </div>
    </div>
    <nav class="options">
        <div class="dropdown">
            <button class="dropbtn">Ordina per</button>
            <div class="dropdown-content">
              <div id="default">ID</div>
              <div id="nome">Nome</div>
              <div id="rarita">Rarità</div>
            </div>
        </div>
        <form class="check">
            <input type="checkbox" id="checco" >
            <label for="checco">Mostra non possedute</label>
        </form>
        <div class="dropdown">
            <button class="dropbtn">Ordine</button>
            <div class="dropdown-content">
              <div id="crescente">Crescente</div>
              <div id="decrescente">Decrescente</div>
            </div>
        </div>
    </nav>
    <div class="central">
        <div id="zonaCarte"></div>
        <script>
            $(document).ready(function(){
              DisplayCollezione("start"); 
              controllacheck();
              $("#default").click(function(){DisplayCollezione('default')});
              $("#nome").click(function(){DisplayCollezione('nome')});
              $("#rarita").click(function(){DisplayCollezione('rarita')});
              $("#crescente").click(function(){cambiaordine('asc')});
              $("#decrescente").click(function(){cambiaordine('desc')});
              $("#checco").click(function(){cambiastatocheck()});
            });
        </script>
    </div>

</body>
</html>