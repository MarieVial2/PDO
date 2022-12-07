<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>Envoyer un post</h2>
    <form action="index.php" method="POST">
        <label for="titre">Titre : </label>
        <input type="text" name="titre" id="titre">
        <label for="contenu">Votre message :</label>
        <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea>
        <input type="submit" value ="envoyer">

    </form>


</body>
</html>