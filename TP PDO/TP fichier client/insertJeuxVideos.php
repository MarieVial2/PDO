<?php
$pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306','root','',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if ($_POST) {

    $nom = $_POST['nom'];
    $possesseur = $_POST['possesseur'];
    $console = $_POST['console'];
    $prix = $_POST['prix'];
    $nbre_joueurs_max = $_POST['nbre_joueurs_max'];
    $commentaires = $_POST['commentaires'];

    if ($nom != "") {
        $req1 = $pdo->prepare("
        INSERT INTO jeux_video (nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
        VALUES (?, ?, ?, ?, ?, ?)
        ");
        $req1->execute([$nom, $possesseur, $console, $prix, $nbre_joueurs_max, $commentaires]);
        

}
}
header('location:index.php');
?>