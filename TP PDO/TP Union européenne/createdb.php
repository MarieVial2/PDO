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

$sql = "CREATE DATABASE IF NOT EXISTS `eucountries` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);


try{
    $pdo = new PDO('mysql:host=localhost;port=3306','root','');
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $sql = "CREATE TABLE `eucountries`.`countries` (
        `id` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(100) NOT NULL ,
    `capitale` VARCHAR(100) NOT NULL ,
    `area` INT(30) NOT NULL ,
    `population` INT(10) NOT NULL ,
    `populationDensity` INT(10) NOT NULL ,
    `pib` INT(10) NOT NULL,
    `membershipYear` VARCHAR(100) NOT NULL,
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