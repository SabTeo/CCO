<!DOCTYPE html>
<html>

<head>
  <title>Carte Collezionabili Online</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="Icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Icon/favicon-16x16.png">
  <link rel="stylesheet" href="CSS/main.css">
  <link rel="stylesheet" href="CSS/store.css">
  <link rel="stylesheet" href="CSS/storeAnimation.css">
  <script src="JS/jquery-min.js"></script>
  <script src="JS/giftSystem.js"></script>
  <script defer src="JS/storeFunctions.js"></script>
  
</head>

<body>
  <div class="main">
    <!-- Elementi per animazione spacchettamento-->
    <div class="lock" id="lock"></div>
    <div class="banner banner1 hidden" id="b1"></div>
    <div class="banner banner2 hidden" id="b2"></div>
    <div class="banner banner3 hidden" id="b3"></div>
    <div class="horizontal-banner" id="horizontal"></div>

    <div class="menu-bar">
      <div class="menu-item">
        <object id="arrowBack" data="Assets/arrow_back.svg" height="30px" width="30"> </object>
        <span>
          <h3>Collezione</h3>
        </span>
      </div>
      <div class="menu-item top-item">
        <span>
          <h2>Negozio</h2>
        </span>
      </div>
      <div class="menu-item">
        <object id="giftIcon" data="Assets/gift.svg" height="22px" width="22"> </object>
        <span>
          <?php require_once 'PHP/dbConnection.php'; require_once 'PHP/giftSystem.php';
            $a = giftAvailable();
            //si
            if($a>=22){
              $username = 'mat'; //ATTENZIONE il nome va preso da $session
              $connection = dbconnect();
              $c = giftClaimed($connection, $username);
              if(!$c) echo "<p>ecco il tuo regalo!</p>";
              else{
                goto end;
              }
            }
            //no
            else{
              end:
              echo "<p class=\"giftNotice\">disponibile tra: $a ore!</p>";
            }
          ?>
        </span>
      </div>
    </div>

    <div class="central">
      <img class="crystal" src="Assets/crystal.png">
      <button class="button" onclick="buyAnim()" id="buy-button">Acquista</button>
      <p class="desc">Ogni pacchetto contiene una carta casuale non posseduta</p>
      <button class="button invisible" id="end-button" 
              style="top:75%; z-index:102; transition:1s;">OK</button>
      <div class="amountContainer">
        <!--mostra cristalli posseduti da user memorizzato in sessione-->
        <?php require_once 'PHP/dbConnection.php';
          $username = 'mat'; //ATTENZIONE il nome va preso da $session
          $connection = dbconnect();
          $val = getValuta($connection, $username);
          echo"<p class=\"amount\" id=\"amountAv\">$val</p>";
        ?>
        <p class="amount">/100</p>
      </div>
      <!--chiamata ajax per la nuova carta e aggiornamento db-->
      <div class="card-container" id="card-container">
        <div class="card flipped hidden" id="card-new">
        <div class="card-front">Stasera lol?</div>
          <div class="card-back">
            <img src="Assets/sapienza.jpg" 
              class="back-image"
              alt="sapienza logo">
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>