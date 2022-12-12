<?php
$pdo = new PDO('mysql:host=localhost;dbname=locationvoitures;port=3306','root','',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if ($_POST) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $idVoiture = $_POST['idVoiture'];

    if ($nom != "") {
        $req1 = $pdo->prepare("
        INSERT INTO clients (nom, prenom, idVoiture)
        VALUES (?, ?, ?)
        ");
        $req1->execute([$nom, $prenom, $idVoiture]);
        

}
}
header('location:clients.php');
?>