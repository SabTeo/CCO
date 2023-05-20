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
  <title>Carte Collezionabili Online - Negozio</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="Icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Icon/favicon-16x16.png">
  <link rel="stylesheet" href="CSS/main.css">
  <link rel="stylesheet" href="CSS/store.css">
  <link rel="stylesheet" href="CSS/storeAnimation.css">
  <link rel="stylesheet" href="micromodal/micromodal.css">
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>
  <script src="JS/jquery-min.js"></script>
  <script src="micromodal/micromodal.min.js"></script>
  <script src="JS/storeFunctions.js"></script>
  
</head>

<body>
  <div class="main">
    <!-- Elementi per animazione spacchettamento-->
    <div class="lock" id="lock"></div>
    <div class="banner banner1 hidden" id="b1"></div>
    <div class="banner banner2 hidden" id="b2"></div>
    <div class="banner banner3 hidden" id="b3"></div>
    <div class="horizontal-banner" id="horizontal"></div>

    <div class="gift-tooltip" style="display:none">
      Visita il negozio ogni giorno tra le 15 e le 18 per ricevere un bonus giornaliero di 100 cristalli
      <p class="tooltipTimer"></p>
    </div>

    <div class="menu-bar">
      <div class="menu-item">
        <div class="mbtn" onclick="window.location='collezione.php';">
          <img id="arrowBack" src="Assets/arrow_back.svg" height="30px" width="30"> </img>
          <h3>Collezione</h3>
        </div>
      </div>
      <div class="menu-item top-item">
        <h2>Negozio</h2>
      </div>
      <div class="menu-item">
        <div class="hov">
          <img id="giftIcon" src="Assets/gift.svg" height="20px" width="20"> 
          <?php require_once 'PHP/dbConnection.php'; require_once 'PHP/giftSystem.php';
            $connection = dbconnect();
            $username = $_SESSION['username'];
            $a = giftAvailable();
            if($a>=22){
              $c = giftClaimed($connection, $username);
              if(!$c){
                echo "<p class=\"giftNotice\">Ricompensa riscattata!</p>";
                return;
              }
            }
            echo "<p id=\"tlabel\" class=\"giftNotice\">Disponibile tra</p><p id=\"timer\" class=\"giftNotice\"></p>";
            echo "<script> displayTimer() </script>";
          ?>
        </div>
      </div>
    </div>

    <div class="central">
      <img class="crystal" src="Assets/crystal.png">
      <div class="amountContainer">
        <!--mostra cristalli posseduti da user memorizzato in sessione-->
        <?php require_once 'PHP/dbConnection.php';
          $val = getValuta($connection, $username);
          echo"<p class=\"amount\" id=\"amountAv\">$val</p>";
          echo"<script>
            var valuta = $val;
            var user = \"$username\";
          </script>";
        ?>
        <p class="amount">/100</p>
      </div>
      <button class="button" onclick="buy()" id="buy-button">Acquista</button>
      <p class="desc">Ogni pacchetto contiene una carta casuale non posseduta</p>
    </div>
      <!--nuova carta riempita da chiamata ajax-->
    <div class="anim">
      <div class="anibox anihidden" id="anibox">
        <div class="card-container new-card-container" id="new-card-cont">
          <div class='card flipped' id='card-new'>
            <div class='card-front' id ='card-front'>
              <div class='card-fill'>
                <div class='card-content-big' id="new-cont">
                </div>
              </div>
            </div>
            <div class='card-back'>
              <img src='Assets/sapienza.jpg' 
                class='back-image'
                alt='sapienza logo'>
            </div>
          </div>
        </div>
        <button class="button invisible" id="end-button">OK</button>
      </div>
    </div>
  </div>
    <!--modal-->
    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <p class="modal__title" id="modal-1-title">Avviso</p>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close>
            <img class="modal__esc" src="Assets/escb.svg"></img>
          </button>
        </header>
        <main class="modal__content" id="modal-1-content">
          <p>Complimenti! hai finito la collezione</p>
        </main>
        <footer class="modal__footer">
          <button class="modal__btn" 
                  onclick="window.location='collezione.php';"
                  >Ok</button>
        </footer>
      </div>
    </div>
  </div>
</body>
</html>