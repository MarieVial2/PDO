<?php

session_start();
if (isset($_SESSION['id'])){
try {
  $pdo = new PDO('mysql:host=localhost;dbname=pokedex;port=3306', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sth = $pdo->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = $_SESSION[id]");
  $sth->execute();
  $tableau = $sth->fetchAll();
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
}

mb_internal_encoding('UTF-8');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Rubik+Spray+Paint&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
   
    <link rel="stylesheet" href="style/style.css">
     <link rel="stylesheet" media="screen and (min-width: 850px)" href="style/style-850.css" />
    
    <script src="https://kit.fontawesome.com/dcef3565c8.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <title>Pokédex</title>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-danger">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="images/logo.png" alt="pokedex" width="130" height="50">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-md-inline-flex justify-content-between" id="navbarNav">
      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"  href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pokemon.php">Les pokémons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="connexion.php">Se connecter</a>
        </li>
        </ul>
    <?php if (isset ($_SESSION['logged'])){
      ?>
      <div id="message_connexion" class="d-md-inline-flex"><p>  Connecté.e en tant que
        <?=$tableau[0]['pseudo']?></p> <div id="avatar" style="background-image : url('<?=$tableau[0]['avatar']?>')"></div> </div> 
      <?php
      }
      ?>
    </div>
  </div>
</nav>
   