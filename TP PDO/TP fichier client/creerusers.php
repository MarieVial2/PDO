<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=locationvoitures;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table users
    $req1 = "CREATE TABLE IF NOT EXISTS `jeuxvideos`.`users`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `pseudo` VARCHAR(50),
    `prenom` VARCHAR(50),
    `age` INT(3),
    PRIMARY KEY(id));";
$pdo->exec($req1);


}
catch (PDOException $e){
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}

$pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306','root','',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if ($_POST) {

    $pseudo = $_POST['pseudo'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    

    if ($pseudo != "") {
        $req1 = $pdo->prepare("
        INSERT INTO users (pseudo, prenom, age, login, password)
        VALUES (?, ?, ?, ?, ?)
        ");
        $req1->execute([$pseudo, $prenom, $age, $login, $password]);
        

}
}
header('location:users.php');
?>

?>