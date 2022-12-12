<?php

include('header.php');


try {
    $pdo = new PDO('mysql:host=localhost;dbname=sportco;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM users");
    $sth->execute();
    $tableau = $sth->fetchAll();

    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$login = $_POST['login'];
$password = $_POST['password'];

if ($login == $tableau[0]['login']) {
    if ($password== $tableau[0]['password']) {
        $_SESSION['logged'] = true;
        header('location: index.php');
    } else {
        $_SESSION['message'] = "Le mot de passe n'est pas correct";
        $_SESSION['logged'] = false;
        header('location: login.php');
    }

} else {
    $_SESSION['message'] = "Le login n'est pas correct";
    $_SESSION['logged'] = false;
    header('location: login.php');
}


?>