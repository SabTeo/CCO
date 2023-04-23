<!DOCTYPE html>
<html>

<head>
  <title>Carte Collezionabili Online</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="Icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Icon/favicon-16x16.png">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="store.css">
  <link rel="stylesheet" href="storeAnimation.css">
  <script src="storeAnimation.js"></script>
  
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
      <div class="central">
        <ul>
          <li>
            <h3>Collezione</h3>
          </li>
          <li>
            <h3>Negozio</h3>
          </li>
        </ul>
      </div>
    </div>
    <div class="central">
      <img class="crystal" src="Assets/crystal.png">
      <button class="button" onclick="buyAnim()" id="buy-button">Acquista</button>
      <p class="desc">Ogni pacchetto contiene una carta casuale non posseduta</p>
      <button class="button invisible" onclick="window.location.reload()" id="end-button" 
        style="top:75%; z-index:102; transition:1s;">OK</button>
      <!--mostra cristalli posseduti da user memorizzato in sessione-->
      <?php require_once 'dbConnection.php';
        $username = 'mat'; //ATTENZIONE il nome va preso da $session
        $connection = dbconnect();
        $val = getValuta($connection, $username);
        echo"<p class=\"amount\">$val/100</p>";
      ?>
      <!--chiamata ajax per la nuova carta-->
      <div class="card-container" id="card-container">
        <div class="card card-new hidden" id="card-new">    
          <div class="card-rev-front">
            <img src="Assets/sapienza.jpg" 
              class="back-image"
              alt="sapienza logo">
          </div>
          <div class="card-rev-back">Stasera lol?</div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>