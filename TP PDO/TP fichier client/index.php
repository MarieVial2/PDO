<?php


try {
    $pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM jeux_video");
    $sth->execute();
    $tableau = $sth->fetchAll();

    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux videos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700&family=Zen+Dots&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>

</head>
<?php
include('Elements/header.php');

?>
<body>


    <div class="container">
        
    
        <h3>Tableau des jeux videos :</h3>
        <table>
            <tr><th>Nom</th>
            <th>Possesseur</th>
            <th>Console</th>
            <th>Prix</th>
            <th>Nb de joueurs max</th>
            <th>Commentaires</th>
            <th>Modifier</th>
            <th>Suppression</th>
            </tr>

            
                <?php
                
                    foreach ($tableau as $cle => $valeur) {
                        // var_dump($valeur['id']);
                        ?><tr>
                        <td><?= $valeur['nom']?></td>
                        <td><?= $valeur['possesseur']?></td>
                        <td><?= $valeur['console']?></td>
                        <td><?= $valeur['prix']?></td>
                        <td><?= $valeur['nbre_joueurs_max']?></td>
                        <td><?= $valeur['commentaires']?></td>
                        <td>
                            <form action="updateJeuxVideo.php" method="GET">
                                <input type="hidden" value="<?= $valeur['id']?>" name="id_jeuvideo">
                                <input type="submit" value="Modifier">
                            </form>
                        </td>
                        <td>
                            <form action="deleteJeuxVideos.php" method="GET">
                                <input type="hidden" value="<?= $valeur['id']?>" name="id_jeuvideo">
                                <input type="submit" value="Supprimer">
                            </form>
                        </td>
                    </tr>
                        <?php
                    }
                ?>
            


        </table>
        
    </div>
</body>

</html>