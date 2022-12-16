<?php

session_start();
if (isset($_SESSION['nom'])) {
try {
    $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM licencie WHERE $_SESSION[id] = id_licencie");
    $sth->execute();
    $tableau2 = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Rubik+Spray+Paint&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
   
    <link rel="stylesheet" href="assets/style.css">
     <link rel="stylesheet" media="screen and (max-width: 1280px) and (min-width: 820px)" href="assets/style-1280.css" />
     <link rel="stylesheet" media="screen and (max-width: 820px) and (min-width: 620px)" href="assets/style-820.css" />
     <link rel="stylesheet" media="screen and (max-width: 620px) and (min-width: 320px)" href="assets/style-620.css" />
    <script src="https://kit.fontawesome.com/dcef3565c8.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <title>Nauwert Sports</title>
</head>

<body>

    <header>
        <nav>
            <ul class="main">
                <li><a href="index.php">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sports
                    </a>
                    <div class="dropdown">
                        <ul class="dropdown-menu">
                            <?php
                            if (isset($_SESSION['nom'])) {
                            foreach ($tableau2 as $cle => $valeur) {
                                if ($valeur['admin'] ==1) {
                            ?>
                            <li><a class="dropdown-item" id="diviser" href="sports.php">Ajouter un sport</a></li>

                            <?php
                            }}}
                            try {
                                $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $sth = $pdo->prepare("SELECT * FROM section");
                                $sth->execute();
                                $tableau = $sth->fetchAll();
                            } catch (PDOException $e) {
                                echo "Erreur : " . $e->getMessage();
                            }

                            // $nom_sansespace = str_replace(" ", "_", $tableau[0]['nom_section']);

                            foreach ($tableau as $key => $valeur) {
                            ?>
                                <li><div class="dropdown-item" href="section_presentation.php">
                                        <form action="section_presentation.php" method="POST">
                                            <input type="hidden" value="<?= $valeur['id_section'] ?>" name="id">
                                            <input type="submit" value="<?= $valeur['nom_section'] . " - " . $valeur['sport'] ?>">
                                        </form>
                            </div></li>

                            <?php
                            }
                            ?>
                        </ul>
                </li>
                </div>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="forum.php">Forum</a></li>
            </ul>


            <ul>
                <li><?php 
                if (isset($_SESSION['nom'])) {
                    echo "<p>".$_SESSION['nom']." ". $_SESSION['prenom']. "</p>";
                    echo '<form action="deconnexion.php" method="POST">

                    <input type="submit" value="Déconnexion"></form>';

                } else {
                    ?>
                <a href="connexion.php">Connexion</a>
                <?php
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </header>