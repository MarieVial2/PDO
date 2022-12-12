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
                <h3>Se connecter</h3>
                <form action="connexion.php" method="POST">
                    <?php
                    if (!empty($_SESSION['message'] )) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        session_destroy();
                    }
                   
                    ?>

                    <label for="login">Login :</label>
                    <input type="text" name="login" id="login">


                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password">


                    <input type="submit" value="Envoyer">

                </form>
            </div>
        
        </div>
       

        </div>

        </body>

</html>