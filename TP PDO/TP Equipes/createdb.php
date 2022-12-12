<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306','root','');
$sql = "CREATE DATABASE IF NOT EXISTS `sportco` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try{
    $pdo = new PDO('mysql:host=localhost;dbname=sportco;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table equipes
    $req1 = "CREATE TABLE IF NOT EXISTS `sportco`.`equipes`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(50),
    `stade` VARCHAR(50),
    `ville` VARCHAR(50),
    `codepostal` VARCHAR(50),
    `sport` VARCHAR(50),
    `niveau` VARCHAR(50),
    `logo` VARCHAR(100),
    `datecreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id));";
$pdo->exec($req1);


}
catch (PDOException $e){
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}

try{
    $pdo = new PDO('mysql:host=localhost;dbname=sportco;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table joueurs
    $req2 = "CREATE TABLE IF NOT EXISTS `sportco`.`joueurs`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(50),
    `prenom` VARCHAR(50),
    `age` INT(50),
    `photo` VARCHAR(100),
    `equipe_id` INT NOT NULL,
    `datecreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id), FOREIGN KEY (equipe_id) REFERENCES equipes (id));";
$pdo->exec($req2);

$req3 = "CREATE TABLE IF NOT EXISTS `sportco`.`users`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(50),
    `password` VARCHAR(50),
    PRIMARY KEY(id));";
$pdo->exec($req3);


}
catch (PDOException $e){
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}

?>