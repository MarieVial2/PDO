<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //On prépare la requête et on l'exécute
    $req = $pdo->prepare("
    UPDATE jeux_video
    SET nom='$_POST[nom]',
    possesseur='$_POST[possesseur]',
    console='$_POST[console]',
    prix=$_POST[prix],
    nbre_joueurs_max=$_POST[nbre_joueurs_max],
    commentaires='$_POST[commentaires]'
    WHERE id=$_POST[id_jeuvideo]
    ");
    $req->execute();
    $count = $req->rowCount();
    print('Mise à jour de ' .$count. ' entrée(s)');

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// header('location:index.php');
?>

