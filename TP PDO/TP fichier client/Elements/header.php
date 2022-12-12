<?php
session_start();

?>

<header>
    <h1>Site de jeux vidéos</h1>
    <h2>Pour les adeptes de la console</h2>
</header>

<nav>
    <ul>
        <li>
            <a href="index.php">Liste de jeux vidéos</a>
        </li>
        <li>
            <a href="ajout.php"> Ajouter un jeu</a>
        </li>
        <li>
            <a href="users.php">Ajouter un utilisateur</a>
        </li>
        <li>
            <a href="login.php">Se connecter</a>
        </li>
        <?php
        if (isset($_SESSION['logged'])) {
        if ($_SESSION['logged']) {
            echo "<li>
            <a href=\"espacemembre.php\">Espace membre</a>
        </li>";
        }
    }
        ?>
        
    </ul>

</nav>