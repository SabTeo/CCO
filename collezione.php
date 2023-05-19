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
  <title>Carte Collezionabili Online - Collezione</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="Icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Icon/favicon-16x16.png">
  <link rel="stylesheet" href="CSS/main.css">
  <link rel="stylesheet" href="CSS/collezione.css">
  <link rel="stylesheet" href="micromodal/micromodal.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="micromodal/micromodal.min.js"></script>
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
        <div class="mbtn" onclick="showDialog();">
          <img id="profile" src="Assets/account.svg" height="30px" width="30"> </img>
          <h3>Utente</h3>
        </div>
      </div>
      <div class="menu-item top-item">
        <h2>Collezione</h2>
      </div>
      <div class="menu-item">
        <div class="mbtn" onclick="window.location='store.php';">
            <h3>Negozio</h3>
            <img id="cart" src="Assets/cart.svg" height="20px" width="20">
        </div>
      </div>
    </div>
    <div class="menu-bar" id="menu2">
      <div class="menu-item">
        <div class="dropdown" id="dd1">
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
      </div>
      <div class="menu-item">
        <form class="check">
            <input type="checkbox" id="checco" ></br>
            <label for="checco" id="labelcheckbox">Mostra non possedute</label>
        </form>
      </div>
      <div class="menu-item">
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
      </div>
    </div>
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

  <!--modal-->
  <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <p class="modal__title" id="modal-1-title">
            Utente
          </p>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close>
            <img class="modal__esc" src="Assets/escb.svg"></img>
          </button>
        </header>
        <main class="modal__content" id="modal-1-content">
          <p>   
            <?php $user = $_SESSION['username'];
            echo"Hai effettuato il login come $user";?>
          </p>
        </main>
        <footer class="modal__footer">
          <button class="modal__btn" 
                  onclick="sessionStorage.clear(); window.location='/PHP/logout.php';"
                  >Logout</button>
        </footer>
      </div>
    </div>
  </div>
      
</body>
</html>