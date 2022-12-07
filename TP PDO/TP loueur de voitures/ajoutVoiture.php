<?php
$pdo = new PDO('mysql:host=localhost;dbname=locationvoitures;port=3306','root','',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if ($_POST) {

    $immatriculation = $_POST['immatriculation'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $image = $_POST['image'];

    if ($immatriculation != "") {
        $req1 = $pdo->prepare("
        INSERT INTO voitures (immatriculation, marque, modele, annee, image)
        VALUES (?, ?, ?, ?, ?)
        ");
        $req1->execute([$immatriculation, $marque, $modele, $annee, $image]);
        

}
}
header('location:index.php');
?>