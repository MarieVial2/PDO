<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" media="screen and (max-width: 650px)" href="style/style-650.css" />

    <script src="https://kit.fontawesome.com/dcef3565c8.js" crossorigin="anonymous"></script>
    
    <script src="https://kit.fontawesome.com/dcef3565c8.js" crossorigin="anonymous"></script>
    
    <title>TP mini-boutique</title>
</head>

<body>



        <header>
            
            <div id="header">
                <h1>Kids'n'Us</h1>
            </div>
        </header>

        <nav role="navigation">
            <div id="menuToggle">
                <!--
    A fake / hidden checkbox is used as click reciever,
    so you can use the :checked selector on it.
    -->
                <input type="checkbox" />

                <!--
    Some spans to act as a hamburger.
    
    They are acting like a real hamburger,
    not that McDonalds stuff.
    -->
                <span></span>
                <span></span>
                <span></span>

                <!--
    Too bad the menu has to be inside of the button
    but hey, it's pure CSS magic.
    -->
                <ul id="menu">
                    <a href="index.php" >
                        <li >Boutique</li>
                    </a>
                    
                    <a href="#">
                        <li>Panier</li>
                    </a>
                    <?php if(isset($_SESSION['logged'])) {
                        ?>
                    
                    <a href="ajouter-produit.php">
                        <li>Ajouter un produit</li>
                    </a>
                <?php
                }
                ?>
                    <?php if(isset($_SESSION['logged'])) {
                        ?>
                    
                    <a href="traitement/deconnexion.php">
                        <li>Se déconnecter</li>
                    </a>
                <?php
                } else {
                    ?>
                    <a href="connexion.php">
                        <li>Se connecter</li>
                    </a>
                    <?php
                }
                ?>


                </ul>
            </div>

            <div id="menu-desktop">
                <ul>
                    <a href="index.php">
                        <li id="boutique">Boutique <i class="fa-solid fa-gift"></i></li>
                    </a>
                    <a href="">
                        <li id="panier">Panier <i class="fa-solid fa-cart-plus"></i></li>
                    </a>

                    <?php if(isset($_SESSION['logged'])) {
                        ?>
                    
                    <a href="ajouter-produit.php">
                        <li id="ajouterunproduit">Ajouter un produit <i class="fa-solid fa-plus"></i></li>
                    </a>
                <?php
                }
                ?>
                </ul>
                <ul>
                    <?php if(isset($_SESSION['logged'])) {
                        ?>
                    
                    <a href="traitement/deconnexion.php">
                        <li id="sedeconnecter">Se déconnecter <i class="fa-solid fa-arrow-left"></i></li>
                    </a>
                <?php
                } else {
                    ?>
                    <a href="connexion.php">
                        <li id="seconnecter">Se connecter <i class="fa-solid fa-arrow-right"></i></li>
                    </a>
                    <?php
                }
                ?>



                
                </ul>
            </div>
        </nav>
        