<?php
var_dump($_GET['id_jeuvideo']);
try{
    
    $id_jeuvideo = $_GET['id_jeuvideo']; 
    
$pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE FROM jeux_video WHERE id= '$id_jeuvideo'";
$sth = $pdo->prepare($sql);
$sth->execute();

}
catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}

header('location: index.php');
?>