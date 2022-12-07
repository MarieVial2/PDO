<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
$sql = "CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=blog;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    $req1 = "CREATE TABLE IF NOT EXISTS `blog`.`posts`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(100),
    `contenu` VARCHAR(1000),
    `datePost` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY(id));";
    $pdo->exec($req1);

   
    $req2 = "CREATE TABLE IF NOT EXISTS `blog`.`commentaires` (
`id` INT NOT NULL AUTO_INCREMENT ,
`idPost` INT NOT NULL,
`auteur` VARCHAR(100),
`commentaire` VARCHAR(1000),
`dateCommentaire` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`id`) , FOREIGN KEY(idPost) REFERENCES `posts` (`id`)
);";
    $pdo->exec($req2);
    echo 'Félicitations, les tables ont bien été créées !';
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
