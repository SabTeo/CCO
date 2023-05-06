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
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>
  <script src="JS/jquery-min.js"></script>
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
        <div class="btn">
          <img id="arrowBack" src="Assets/arrow_back.svg" height="30px" width="30"> </img>
          <h3>Collezione</h3>
        </div>
      </div>
      <div class="menu-item top-item">
        <h2>Negozio</h2>
      </div>
      <div class="menu-item">
        <div class="hov">
          <img id="giftIcon" src="Assets/gift.svg" height="20px" width="20"> </object>
          <?php require_once 'PHP/dbConnection.php'; require_once 'PHP/giftSystem.php';
            $a = giftAvailable();
            //si
            if($a>=22){
              $username = 'mat'; //ATTENZIONE il nome va preso da $session
              $connection = dbconnect();
              $c = giftClaimed($connection, $username);
              if(!$c) echo "<p class=\"giftNotice\">ecco il tuo regalo!$c</p>";
              else{
                goto end;
              }
            }
            //no
            else{
              end:
              if($a!=1){
                echo "<p class=\"giftNotice\">disponibile tra: $a ore!</p>";
              }
              else echo "<p class=\"giftNotice\">disponibile tra: $a ora!</p>";
            }
          ?>
        </div>
      </div>
    </div>

    <div class="central">
      <img class="crystal" src="Assets/crystal.png">
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
      <button class="button" onclick="buyAnim()" id="buy-button">Acquista</button>
      <p class="desc">Ogni pacchetto contiene una carta casuale non posseduta</p>
    </div>
      <!--chiamata ajax per la nuova carta e aggiornamento db-->
      <div class="anim">

        <div class="anibox anihidden" id="anibox">

        <div class="card-container new-card-container" id="new-card-cont">
          <div class="card flipped" id="card-new">
          <div class="card-front">Stasera lol?</div>
            <div class="card-back">
              <img src="Assets/sapienza.jpg" 
                class="back-image"
                alt="sapienza logo">
            </div>
          </div>
        </div>   
        <button class="button invisible" id="end-button" 
                style="top:75%; z-index:102; transition:1s;">OK</button>

        </div>

      </div>


  </div>
</body>
</html>