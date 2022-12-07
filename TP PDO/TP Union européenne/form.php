<?php

// echo $_POST['capitale'];

    if (!empty($_POST)) {
        if (isset($_POST['name'])) {

        

try{
    $pdo = new PDO('mysql:host=localhost;dbname=eucountries;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $pdo->prepare("
    INSERT INTO `eucountries`.`countries` (name, capitale, area, population, populationDensity, pib, membershipYear)
    VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $name = $_POST['name'];
    $capitale = $_POST['capitale'];
    $area = $_POST['area'];
    $population = $_POST['population'];
    $populationDensity = $_POST['populationDensity'];
    $pib = $_POST['pib'];
    $membershipYear = $_POST['membershipYear'];

    $sth->execute([$name, $capitale, $area, $population, $populationDensity, $pib, $membershipYear]
);

}
catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}

}
} 


header('location:index.php');
?>