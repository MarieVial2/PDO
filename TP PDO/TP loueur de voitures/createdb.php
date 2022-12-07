<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306','root','');
$sql = "CREATE DATABASE IF NOT EXISTS `locationvoitures` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try{
    $pdo = new PDO('mysql:host=localhost;dbname=locationvoitures;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table voitures
    $req1 = "CREATE TABLE IF NOT EXISTS `locationvoitures`.`voitures`(
    `idVoiture` INT NOT NULL AUTO_INCREMENT,
    `immatriculation` VARCHAR(50),
    `marque` VARCHAR(50),
    `modele` VARCHAR(50),
    `annee` VARCHAR(10),
    `image` VARCHAR(50),
    PRIMARY KEY(idVoiture));";
$pdo->exec($req1);

//Création de la table clients
$req2 = "CREATE TABLE IF NOT EXISTS `locationvoitures`.`clients` (
`idUser` INT NOT NULL AUTO_INCREMENT ,
`nom` VARCHAR(50),
`prenom` VARCHAR(50),
`idVoiture` INT NOT NULL,
`dateLocation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`idUser`) , FOREIGN KEY(idVoiture) REFERENCES `voitures` (`idVoiture`)
);";

$pdo->exec($req2);
echo 'Félicitations, les tables ont bien été créées !';
}
catch (PDOException $e){
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}

?>