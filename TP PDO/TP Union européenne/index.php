<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form action="form.php" method="POST">
    <div class="container">
                <div class="mb-3">
                    <label for="name" class="form-label">Le nom du pays :</label>
                    <input type="Text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="capitale" class="form-label">La capitale :</label>
                    <input type="Text" class="form-control" id="capitale" name="capitale">
                </div>

                <div class="mb-3">
                    <label for="area" class="form-label">La superficie :</label>
                    <input type="Text" class="form-control" id="area" name="area">
                </div>

                <div class="mb-3">
                    <label for="population" class="form-label">La population :</label>
                    <input type="Text" class="form-control" id="population" name="population">
                </div>

                <div class="mb-3">
                    <label for="populationDensity" class="form-label">La densité :</label>
                    <input type="Text" class="form-control" id="populationDensity" name="populationDensity">
                </div>

                <div class="mb-3">
                    <label for="pib" class="form-label">Le PIB :</label>
                    <input type="Text" class="form-control" id="pib" name="pib">
                </div>

                <div class="mb-3">
                    <label for="membershipYear" class="form-label">L'année d'entrée dans l'union :</label>
                    <input type="Text" class="form-control" id="membershipYear" name="membershipYear">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>

            </div>
    </form>
    <?php
    try{
    $pdo = new PDO('mysql:host=localhost;dbname=eucountries;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $sth = $pdo->prepare("SELECT * FROM countries");
    $sth->execute();
    $tableau = $sth->fetchAll();

    var_dump($tableau);
  
    foreach ($tableau as $key => $value) {
        ?>
    <ul>
        <li><?= "Nom :" .$value['name']. '<br>' ?></li>
        <li><?= "Capitale :" .$value['capitale']. '<br>' ?></li>
        <li><?= "Superficie :" .$value['area']. '<br>' ?></li>
        <li><?= "Population :" .$value['population']. '<br>' ?></li>
        <li><?= "Densité :" .$value['populationDensity']. '<br>' ?></li>
        <li><?= "PIB :" .$value['pib']. '<br>' ?></li>
        <li><?= "Année d'entrée dans l'UE:" .$value['membershipYear']. '<br>' ?></li>
        <form action="supprimer.php" method="GET">
        <input type="hidden" name="id" value="<?= $value['id']?>">
        <input type="submit" value="supprimer" >
        
    
    </form>
    </ul>
    
    <?php
    }
    }
    catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    }

    
?>
    </body>
</html>