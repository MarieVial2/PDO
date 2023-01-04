<?php

include('../assets/header.php');


$login = $_POST['email'];
$motdepasse = $_POST['password'];
try {
    $pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM utilisateur WHERE '$login' = email_utilisateur");
    $sth->execute();
    $tableau = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if ($login == $tableau[0]['email_utilisateur']) {
    if ($motdepasse == $tableau[0]['mdp_utilisateur']) {
        $_SESSION['logged'] = true;
        $_SESSION['nom'] = $tableau[0]['nom_utilisateur'];
        $_SESSION['prenom'] = $tableau[0]['prenom_utilisateur'];
        $_SESSION['id'] = $tableau[0]['id_utilisateur'];
        header('location: ../index.php');
    } else {
        // $_SESSION['logged'] = false;
        unset($_SESSION['logged']);
        session_destroy();
        $_SESSION['message'] = "Mot de passe incorrect";
        header('location: ../connexion.php');
    }

} else {
    // $_SESSION['logged'] = false;
    // unset($_SESSION['logged']);
    // session_destroy();
    $_SESSION['message'] = "Email incorrect";
    header('location: ../connexion.php');
}








include('../assets/footer.php');

?>