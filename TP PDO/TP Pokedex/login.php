<?php

include('assets/header.php');
$pseudo = $_POST['pseudo'];
$motdepasse = $_POST['password'];
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pokedex;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM utilisateur WHERE '$pseudo' = pseudo");
    $sth->execute();
    $tableau = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if ($pseudo == $tableau[0]['pseudo']) {
    if ($motdepasse == $tableau[0]['motdepasse']) {
        $_SESSION['logged'] = true;
        $_SESSION['pseudo'] = $tableau[0]['pseudo'];
        $_SESSION['id'] = $tableau[0]['id_utilisateur'];
        header('location: index.php');
    } else {
        // $_SESSION['logged'] = false;
        unset($_SESSION['logged']);
        session_destroy();
        $_SESSION['message'] = "Mot de passe incorrect";
        header('location: connexion.php');
    }

} else {
    // $_SESSION['logged'] = false;
    unset($_SESSION['logged']);
    session_destroy();
    $_SESSION['message'] = "Email incorrect";
    header('location: connexion.php');
}




include('assets/footer.php');


?>