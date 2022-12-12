<?php

session_start();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700&family=Rubik+Vinyl&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 740px) and (min-width: 320px)" href="style-740.css" />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <title>Equipes</title>
</head>
<body>
    
<header>
    <h1>TP Equipes</h1>
</header>

<nav>
    <ul>
        <?php 
        if (isset($_SESSION['logged'])) {
        if ($_SESSION['logged']) {
            echo '<li> <a href="index.php">Ajouter une équipe</a></li>
            <li> <a href="joueur.php">Ajouter un joueur</a></li>';
        } else {
            echo '<li> <a href="index.php">Accueil</a></li>
            <li> <a href="login.php">Se connecter</a></li>';
        }
        } else {
            echo '<li> <a href="index.php">Accueil</a></li>
            <li> <a href="login.php">Se connecter</a></li>';
        }
        ?>
        
    </ul>
</nav>
