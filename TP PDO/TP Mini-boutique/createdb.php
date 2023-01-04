<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
$sql = "CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=boutique;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table produit
    $req1 = "CREATE TABLE IF NOT EXISTS `boutique`.`produit`(
        id_produit INT NOT NULL AUTO_INCREMENT,
   nom_produit VARCHAR(50),
   prix_produit DECIMAL(3,2),
   photo_produit VARCHAR(200),
   description_produit VARCHAR(500),
   id_categorie INT NOT NULL,
   id_tranche VARCHAR(50) NOT NULL,
   id_utilisateur INT NOT NULL,
   PRIMARY KEY(id_produit),
   FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie),
   FOREIGN KEY(id_tranche) REFERENCES tranche_age(id_tranche),
   FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur)
);
";
    $pdo->exec($req1);

    //Création de la table utilisateur
    $req2 = "CREATE TABLE IF NOT EXISTS `boutique`.`utilisateur`(
        id_utilisateur INT NOT NULL AUTO_INCREMENT,
   nom_utilisateur VARCHAR(50),
   prenom_utilisateur VARCHAR(50),
   email_utilisateur VARCHAR(50),
   mdp_utilisateur VARCHAR(50),
   PRIMARY KEY(id_utilisateur)
);
";

    $pdo->exec($req2);

    //Création de la table categorie
    $req3 = "CREATE TABLE IF NOT EXISTS `boutique`.`categorie`(
        id_categorie INT NOT NULL AUTO_INCREMENT,
   nom_categorie VARCHAR(50),
   couleur_categorie VARCHAR(50),
   PRIMARY KEY(id_categorie)
);
";
    $pdo->exec($req3);

    //Création de la table tranche d'age
    $req4 = "CREATE TABLE IF NOT EXISTS `boutique`.tranche_age(
        id_tranche INT NOT NULL AUTO_INCREMENT,
        valeur_tranche VARCHAR(50),
        PRIMARY KEY(id_tranche)
     );
     ";
    $pdo->exec($req4);


} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
