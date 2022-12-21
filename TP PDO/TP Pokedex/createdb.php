<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
$sql = "CREATE DATABASE IF NOT EXISTS `pokedex` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=omnisport;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table type
    $req1 = "CREATE TABLE IF NOT EXISTS pokedex.`type`(
        id_type INT NOT NULL AUTO_INCREMENT,
        nom_type VARCHAR(50),
        couleur_type VARCHAR(50),
        icone_type VARCHAR(200),
        PRIMARY KEY(id_type)
     );
     ";
    $pdo->exec($req1);
    echo "La table 1 a bien été créée <br>";

    //Création de la table utilisateur
    $req2 = "CREATE TABLE IF NOT EXISTS pokedex.`utilisateur`(
        id_utilisateur INT NOT NULL AUTO_INCREMENT,
        email VARCHAR(50),
        motdepasse VARCHAR(50),
        avatar VARCHAR(200),
        pseudo VARCHAR(50),
        PRIMARY KEY(id_utilisateur)
     );
     ";

    $pdo->exec($req2);
    echo "La table 2 a bien été créée <br>";
    //Création de la table pokemon
    $req3 = "CREATE TABLE IF NOT EXISTS pokedex.pokemon(
        id_pokemon INT NOT NULL AUTO_INCREMENT,
        nom_pokemon VARCHAR(50),
        poids DECIMAL(10,2),
        numero_pokemon VARCHAR(50),
        description_pokemon VARCHAR(1000),
        taille DECIMAL(10,2),
        id_utilisateur INT NOT NULL,
        PRIMARY KEY(id_pokemon),
        FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur)
     );
     ";
    $pdo->exec($req3);
    echo "La table 3 a bien été créée <br>";
    //Création de la table attaque
    $req4 = "CREATE TABLE IF NOT EXISTS pokedex.attaque(
        id_attaque INT NOT NULL AUTO_INCREMENT,
        nom_attaque VARCHAR(50),
        degats_attaque INT,
        pp_attaque BIT,
        id_type INT NOT NULL,
        PRIMARY KEY(id_attaque),
        FOREIGN KEY(id_type) REFERENCES `type`(id_type)
     );
     ";
    $pdo->exec($req4);
    echo "La table 4 a bien été créée <br>";
    //Création de la table pokemon_attaque
    $req5 = "CREATE TABLE IF NOT EXISTS pokedex.pokemon_attaque(
        id_pokemon INT NOT NULL,
        id_attaque INT NOT NULL,
        PRIMARY KEY(id_pokemon, id_attaque),
        FOREIGN KEY(id_pokemon) REFERENCES pokemon(id_pokemon),
        FOREIGN KEY(id_attaque) REFERENCES attaque(id_attaque)
     );
     
     ";
    $pdo->exec($req5);
    echo "La table 5 a bien été créée <br>";
//Création de la table pokemon_type
$req6 = "CREATE TABLE IF NOT EXISTS pokedex.pokemon_type(
    id_pokemon INT NOT NULL,
    id_type INT NOT NULL,
    PRIMARY KEY(id_pokemon, id_type),
    FOREIGN KEY(id_pokemon) REFERENCES pokemon(id_pokemon),
    FOREIGN KEY(id_type) REFERENCES type(id_type)
 );
 ";
$pdo->exec($req6);
echo "La table 6 a bien été créée <br>";
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
