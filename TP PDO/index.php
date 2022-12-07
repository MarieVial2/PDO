<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
<form action="form.php" method="POST">
    <div class="container">
                <div class="mb-3">
                    <label for="nom" class="form-label">Votre nom :</label>
                    <input type="Text" class="form-control" id="nom" name="nom">
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Votre prénom :</label>
                    <input type="Text" class="form-control" id="prenom" name="prenom">
                </div>

                <div class="mb-3">
                    <label for="adresse" class="form-label">Votre adresse :</label>
                    <input type="Text" class="form-control" id="adresse" name="adresse">
                </div>

                <div class="mb-3">
                    <label for="codePostal" class="form-label">Votre code postal :</label>
                    <input type="Text" class="form-control" id="codePostal" name="codePostal">
                </div>

                <div class="mb-3">
                    <label for="nomEntreprise" class="form-label">Le nom de votre entreprise :</label>
                    <input type="Text" class="form-control" id="nomEntreprise" name="nomEntreprise">
                </div>

                <div class="mb-3">
                    <label for="profession" class="form-label">Votre profession :</label>
                    <input type="Text" class="form-control" id="profession" name="profession">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>

            </div>
    </form>
<?php
    try{
    $pdo = new PDO('mysql:host=localhost;dbname=fichierclient;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $sth = $pdo->prepare("SELECT * FROM clients");
    $sth->execute();
    $tableau = $sth->fetchAll();
  
    foreach ($tableau as $key => $value) {
        ?>
    <ul>
        <li><?= "Nom :" .$value['nom']. '<br>' ?></li>
        <li><?= "Prénom :" .$value['prenom']. '<br>' ?></li>
        <li><?= "Adresse :" .$value['adresse']. '<br>' ?></li>
        <li><?= "Code Postal :" .$value['codepostal']. '<br>' ?></li>
        <li><?= "Nom de l'entreprise :" .$value['nomEntreprise']. '<br>' ?></li>
        <li><?= "Profession :" .$value['profession']. '<br>' ?></li>
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