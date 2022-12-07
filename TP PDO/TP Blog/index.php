<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    if ($_POST) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=blog;port=3306', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $pdo->prepare("
    INSERT INTO `blog`.`posts` (titre, contenu)
    VALUES (?, ?)
    ");


        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];


        $sth->execute(
            [$titre, $contenu]
        );
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
$pdo = new PDO('mysql:host=localhost;dbname=blog;port=3306', 'root', '');
    $sth = $pdo->prepare("SELECT * FROM posts");
    $sth->execute();
    $tableau = $sth->fetchAll();
    


   

    ?>
    
        <?php
        foreach ($tableau as $key => $value) {
        ?>
            
               <h2> <?= $value['titre'] ?></h2>
                <p><?= $value['contenu'] ?></p>
            

                <h6>Commenter :</h6>
                <form action="commentaires.php" method="POST">
                    <label for="auteur">Auteur : </label>
                    <input type="text" name="auteur" id="auteur">
                    <label for="commentaire">Votre message :</label>
                    <textarea name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
                    <input type="hidden" value="<?= $value['id'] ?>" name="idPost">
                    <input type="submit" value="envoyer"> 

                </form>

                <h4>Commentaires</h4>

                <?php
            $req2 = $pdo->prepare("SELECT * FROM commentaires INNER JOIN posts ON posts.id = commentaires.idPost");
            $req2->execute();
            $commentaires = $req2->fetchAll(PDO::FETCH_ASSOC);

           

                foreach ($commentaires as $cle => $valeur) {
                     if ($valeur['idPost'] == $value['id']){
                    ?>

                    <h5><?= $valeur['auteur']?></h5>
                    <p><?= $valeur['commentaire']?></p>
                    <?= $valeur['idPost'] ?>

                
            
        <?php
        }}
    }
        ?>
    
</body>

</html>