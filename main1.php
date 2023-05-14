<?php
  session_start();
  if(!array_key_exists('username',$_SESSION)){
    if(array_key_exists('user', $_COOKIE)){
            if(isset($_COOKIE['user'])){
                $user = $_COOKIE['user'];
                session_start();
                $_SESSION['username']= $user;
            //header("Location: /main.php");
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
        <div class="btn">
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
            </div>
        </div>
        <form class="check">
            <input type="checkbox" id="checco">
            <label for="checco">Mostra non possedute</label>
        </form>
    </nav>
    <div class="central">
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

<<<<<<< HEAD
    <div class="central">

    <div class="card-container">
        <div class="card" id="card-new">
        <div class="card-front" id ="card-front">
          <div class="card-fill">
            <div class="card-content">
              <img src="Assets/Images/TrickTotem.png" class="previmg">
              <h4>Totem dell'inganno <hr> </h4>
              <i>"ingannali tutti"</i>
              <p>La migliore carta di Hearthstone mai concepita da Blizzard Entertainment</p>
            </div>
          </div>
        </div>
          <div class="card-back">
            <img src="Assets/sapienza.jpg" 
              class="back-image"
              alt="sapienza logo">
          </div>
        </div>
      </div> 

    </div> 
    <div>
      <a href=/Collezione/Main.php>Collezione</a></br>
      <a href=Logout.php>Logout</a>
    </div>

  </body>
=======
</body>
>>>>>>> a4400c0e5fb179a526babce419e825ca4dc89ef8
</html>