<?php
  session_start();
  if(!array_key_exists('username',$_SESSION)){
    if(array_key_exists('user', $_COOKIE)){
            if(isset($_COOKIE['user'])){
                $user = $_COOKIE['user'];
                session_start();
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
    <link rel="stylesheet" href="CSS/collezione.css"/>
    <link rel="stylesheet" href="CSS/main.css"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="JS/collezionecss.js"></script>
    <script src="JS/collezione.js"></script> 
</head>
<body>

    <div id='overlay' class="overlay hidden cover">
        <div id="zonaDisplay"></div>
    </div>
    <img id=esc class="hidden" src="Assets/esc.svg" height="38px" width="38"
          onclick="$('#overlay').toggleClass('hidden');
              $('#esc').toggleClass('hidden');">

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
            <div class="dropbtn">
              <span class="selected" id="primodd"></span>
              <div class="triangolino"></div>
            </div>
            <ul class="dropdown-content">
              <li class="active" id="default">ID</li>
              <li id="nome">Nome</li>
              <li id="rarita">Rarità</li>
            </ul>
        </div>
        <form class="check">
            <input type="checkbox" id="checco" >
            <label for="checco">Mostra non possedute</label>
        </form>
        <div class="dropdown" id="dd2">
            <div class="dropbtn">
              <span class="selected" id="secondodd"></span>
              <div class="triangolino"></div>
            </div>
            <ul class="dropdown-content">
              <li class="active" id="crescente">Crescente</li>
              <li id="decrescente">Decrescente</li>
            </ul>
        </div>
    </nav>
    <div class="central">
        <div id="zonaCarte"></div>
        <script>
            $(document).ready(function(){
              DisplayCollezione("start"); 
              controllacheck();
              $("#default").click(function(){DisplayCollezione('ID')});
              $("#nome").click(function(){DisplayCollezione('Nome')});
              $("#rarita").click(function(){DisplayCollezione('Rarità')});
              $("#crescente").click(function(){cambiaordine('asc')});
              $("#decrescente").click(function(){cambiaordine('desc')});
              $("#checco").click(function(){cambiastatocheck()});
              prova();
              riempidropdown();
            });
        </script>
    </div>

</body>
</html>