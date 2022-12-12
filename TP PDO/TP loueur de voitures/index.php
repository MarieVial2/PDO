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
                <h3>Ajouter les voitures</h3>
                <form action="ajoutVoiture.php" method="POST">

                    <label for="immatriculation">L'immatriculation du véhicule :</label>
                    <input type="text" name="immatriculation" id="immatriculation">

                    <label for="marque">La marque du véhicule :</label>
                    <input type="text" name="marque" id="marque">

                    <label for="modele">Le modele du véhicule :</label>
                    <input type="text" name="modele" id="modele">

                    <label for="annee">L'année du véhicule :</label>
                    <input type="text" name="annee" id="annee">

                    <label for="image">L'image du véhicule :</label>
                    <input type="text" name="image" id="image">

                    <input type="submit" value="Envoyer">

                </form>
            </div>
            <div class="col-md-7">
                <h3>Les voitures disponibles</h3>
                <ul>
                <?php
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=locationvoitures;port=3306', 'root', '');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sth = $pdo->prepare("SELECT * FROM voitures");
                    $sth->execute();
                    $tableau = $sth->fetchAll();

                    foreach($tableau as $key => $value) {
                        ?>
                        <li><p>Immatriculation :<?=$value['immatriculation']?></p>
                        <p>Marque :<?=$value['marque']?></p>
                        <p>Modele :<?=$value['modele']?></p>
                        <p>Année :<?=$value['annee']?></p>
                        <p>Image :<?=$value['image']?></p></li>
                        
                        <?php
                    }

                } catch (PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
                ?>
                </ul>
            </div>
        </div>

        
    </div>
</body>

</html>