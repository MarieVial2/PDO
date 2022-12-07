<?php



try{
    $pdo = new PDO('mysql:host=localhost;dbname=fichierclient;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $pdo->prepare("
    INSERT INTO `fichierclient`.`clients` (nom, prenom, adresse, codePostal, nomEntreprise, profession)
    VALUES (:nom, :prenom, :adresse, :codePostal, :nomEntreprise, :profession)
    ");


    $sth->execute([
    ':nom' => $nom = $_POST['nom'],    
    ':prenom' => $prenom = $_POST['prenom'],
    ':adresse' => $adresse = $_POST['adresse'],
    ':codePostal' => $codePostal = $_POST['codePostal'],
    ':nomEntreprise' => $nomEntreprise = $_POST['nomEntreprise'],
    ':profession' => $profession = $_POST['profession'],
    ]
);

}
catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}

header('location:index.php');

?>