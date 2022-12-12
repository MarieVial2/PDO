<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=locationvoitures;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM voitures");
    $sth->execute();
    $tableau = $sth->fetchAll();

    $req2 = $pdo->prepare("SELECT * FROM clients INNER JOIN voitures ON voitures.idVoiture = clients.idVoiture");
    $req2->execute();
    $clients = $req2->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Voitures</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>

</head>

<body>


    <div class="container">

        <div class="row">
            <div class="col-md-5">
                <h3>Ajouter des clients</h3>
                <form action="ajoutClient.php" method="POST">

                    <label for="nom">Le nom du client :</label>
                    <input type="text" name="nom" id="nom">

                    <label for="prenom">Le prénom du client :</label>
                    <input type="text" name="prenom" id="prenom">
                    <select name="idVoiture">
                        <option disabled> --Choisissez une catégorie--</option>
                        <?php
                        foreach ($tableau as $key => $value) { ?>
                            <option value="<?php echo $value['idVoiture'] ?>"><?php echo $value['marque'] ?> - <?php echo $value['modele'] ?> - <?php echo $value['immatriculation'] ?></option>
                        <?php
                        }
                        ?>


                        <input type="submit" value="Envoyer">

                </form>
            </div>
            <div class="col-md-7">
                <h3>Les voitures des clients</h3>
                <ul>
                    <?php
                    
                    foreach ($clients as $cle => $valeur) {
                        
                    ?>
                        <li><?= $valeur['nom'] ?> <?= $valeur['prenom'] ?></li>
                        <ul>
                       <li>
                                <p>Immatriculation :<?= $valeur['immatriculation'] ?></p>
                                <p>Marque :<?= $valeur['marque'] ?></p>
                                <p>Modele :<?= $valeur['modele'] ?></p>
                                <p>Année :<?= $valeur['annee'] ?></p>
                                <p>Image :<?= $valeur['image'] ?></p>
                            </li>
                        
                    </ul>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>
        </div>


    </div>
</body>

</html>