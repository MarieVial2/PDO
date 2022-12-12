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
        
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <h3>Ajouter un jeu vidéo</h3>
                <form action="insertJeuxVideos.php" method="POST">

                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom">

                    <label for="possesseur">Possesseur :</label>
                    <input type="text" name="possesseur" id="possesseur">

                    <label for="console">Console :</label>
                    <input type="text" name="console" id="console">

                    <label for="prix">Prix :</label>
                    <input type="number" name="prix" id="prix">

                    <label for="nbre_joueurs_max">Nombre de joueurs max :</label>
                    <input type="number" name="nbre_joueurs_max" id="nbre_joueurs_max">

                    <label for="commentaires">Commentaires :</label>
                    <textarea  name="commentaires" id="commentaires" class="form-control" rows="5"></textarea>

                    <input type="submit" value="Envoyer">

                </form>
            </div>
        
        </div>
        </div>

    
</body>
</html>