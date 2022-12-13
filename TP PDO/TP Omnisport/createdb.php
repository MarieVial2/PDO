<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
$sql = "CREATE DATABASE IF NOT EXISTS `omnisport` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=omnisport;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table section
    $req1 = "CREATE TABLE IF NOT EXISTS `omnisport`.`section`(
        `id_section` INT NOT NULL AUTO_INCREMENT,
        `nom_section` VARCHAR(50),
        `sport` VARCHAR(50),
        `description_section` TEXT,
        `photo_section` VARCHAR(200),
        PRIMARY KEY(id_section));";
    $pdo->exec($req1);

    //Création de la table licencié
    $req2 = "CREATE TABLE IF NOT EXISTS `omnisport`.`licencie`(
        `id_licencie` INT NOT NULL AUTO_INCREMENT,
        email VARCHAR(50),
        `password` VARCHAR(50),
        nom_licencie VARCHAR(50),
        prenom VARCHAR(50),
        photo VARCHAR(50),
        age INT,
        description_licencie TEXT,
        `admin` BOOLEAN,
        id_section INT NOT NULL,
        PRIMARY KEY(id_licencie),
        FOREIGN KEY(id_section) REFERENCES section(id_section))";

    $pdo->exec($req2);

    //Création de la table message
    $req3 = "CREATE TABLE IF NOT EXISTS `omnisport`.`message`(
        `id_message` INT NOT NULL AUTO_INCREMENT,
        contenu_message TEXT,
        date_post TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        titre VARCHAR(50),
        id_licencie INT NOT NULL,
        PRIMARY KEY(id_message),
        FOREIGN KEY(id_licencie) REFERENCES licencie(id_licencie))";
    $pdo->exec($req3);

    //Création de la table commentaire
    $req4 = "CREATE TABLE IF NOT EXISTS `omnisport`.`commentaire`(
        `id_commentaire` INT NOT NULL AUTO_INCREMENT,
        contenu_commentaire TEXT,
        date_comm TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        id_licencie INT NOT NULL,
        id_message INT NOT NULL,
        PRIMARY KEY(id_commentaire),
        FOREIGN KEY(id_licencie) REFERENCES licencie(id_licencie),
        FOREIGN KEY(id_message) REFERENCES `message`(id_message))";
    $pdo->exec($req4);


} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
