<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306','root','');
$sql = "CREATE DATABASE IF NOT EXISTS `jeuxvideos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try{
    $pdo = new PDO('mysql:host=localhost;dbname=jeuxvideo;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table jeux video
    $req1 = "CREATE TABLE IF NOT EXISTS `jeuxvideos`.`jeux_video`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(50),
    `possesseur` VARCHAR(50),
    `console` VARCHAR(50),
    `prix` FLOAT,
    `nbre_joueurs_max` INT(50),
    `commentaires` TEXT,
    PRIMARY KEY(id));";
$pdo->exec($req1);


}
catch (PDOException $e){
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}

?>