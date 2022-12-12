<?php

include('header.php');


try {
    $pdo = new PDO('mysql:host=localhost;dbname=sportco;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM equipes");
    $sth->execute();
    $tableau = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<div class="container">
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <h3>Ajouter un joueur :</h3>
            <form action="formJoueur.php" method="POST" enctype="multipart/form-data">

                <label for="nom">Nom du joueur :</label>
                <input type="text" name="nom_joueur" id="nom">

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom">

                <label for="age">Age :</label>
                <input type="number" name="age" id="age">

                <label for="equipe_id">Equipe :</label>
                <select name="equipe_id" id="equipe_id>
                        <option disabled> --Choisissez une catégorie--</option>
                        <?php
                        foreach ($tableau as $key => $value) { ?>
                            <option value=" <?= $value['id'] ?>"><?= $value['nom'] ?></option>
                <?php
                        }
                ?>

                <label for="photoToUpload">Photo :</label>
                <input type="file" name="photoToUpload" id="photoToUpload">


                <input type="submit" value="Envoyer">


            </form>
        </div>

    </div>
</div>


<?php

include('footer.php');

?>