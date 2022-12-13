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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Rubik+Spray+Paint&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
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
                            <li><a class="dropdown-item" id="diviser" href="sports.php">Ajouter un sport</a></li>

                            <?php
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
                <li><a href="login.php">Connexion</a></li>
            </ul>
        </nav>
    </header>