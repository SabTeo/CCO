<?php session_start(); //dichiara variabile $_SESSION per questa pagina (inizializzata al login!)
    //isUserLogged();
    //if not redirect to login
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte Collezionabili Online</title>
    <link rel="stylesheet" href="CSS/store.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/store.css">
    <script src="JS/jquery-min.js"></script>
  </head>
  <body>
  <?php
    if(!isset($_SESSION['username'])) {
      // anomalo, di chi sono le carte che devo caricare?
      goto end;
    }
    else{
      $currentUser = $_SESSION['username'];
      echo"<h1>$currentUser</h1>";
    }
    end: ;
  ?> 
    <div class="prova">

    <div></div>

    <div class="prova2">
      <div class="card-container3">  
        <div class="card-content">
          <img src="Assets/Images/TrickTotem.png" class="previmg">
        </div>
      </div>
    </div>

    <div></div>

    </div>

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

  </body>
</html>