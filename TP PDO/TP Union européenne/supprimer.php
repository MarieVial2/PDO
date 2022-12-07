<?php
try{
$pdo = new PDO('mysql:host=localhost;dbname=eucountries;port=3306', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE FROM countries WHERE id= '$_GET[id]'";
$sth = $pdo->prepare($sql);
$sth->execute();
$count = $sth->rowCount();
print('Effacement de ' .$count. ' entrées.');
}
catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}

header('location: index.php');
?>