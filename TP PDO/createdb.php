<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php
$pdo = new PDO('mysql:host=localhost;','root','');
// $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données
$sql = "CREATE DATABASE IF NOT EXISTS `fichierclient` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);


try{
$pdo = new PDO('mysql:host=localhost;','root','');
// $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.
$sql = "CREATE TABLE `fichierclient`.`clients` (
    `id` INT NOT NULL AUTO_INCREMENT ,
`nom` VARCHAR(100) NOT NULL ,
`prenom` VARCHAR(100) NOT NULL ,
`adresse` VARCHAR(100) NOT NULL ,
`codepostal` VARCHAR(10) NOT NULL ,
`nomEntreprise` VARCHAR(50) NOT NULL ,
`profession` VARCHAR(100) NOT NULL,
`dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
 ) ENGINE = InnoDB;";
$pdo->exec($sql);
echo 'Félicitations, la table a bien été créée !';
}
catch (PDOException $e){
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}

?>
</body>
</html>