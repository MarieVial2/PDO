<?php

include('assets/header.php');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM categorie");
    $sth->execute();
    $categories = $sth->fetchAll();

    $sth2 = $pdo->prepare("SELECT * FROM tranche_age");
    $sth2->execute();
    $tranches = $sth2->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>

<main>
<div class="container">
    <div class="row">
        <div class="offset-md-3 col-md-4">
            
            <form action="traitement/ajoutProduit.php" method="POST" enctype="multipart/form-data">
                <h3>Ajouter un produit :</h3>
                <label for="nom">Nom :</label>
                <input type="text" name="nom_produit" id="nom">

                

                <label for="prix">Prix :</label>
                <input type="text" name="prix" id="prix">

                <label for="description">Description :</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>

            
                <label for="id_categorie">Catégorie :</label>
                <select name="id_categorie" id="id_categorie">
                        <option disabled> --Choisissez une catégorie--</option>
                        <?php foreach ($categories as $cle => $valeur) { ?>
                        <option value="<?=$valeur['id_categorie']?>"><?=$valeur['nom_categorie']?></option>
                        <?php
                        }
                        ?>
                </select>

                <label for="id_tranche">Tranche d'âge :</label>
                <select name="id_tranche" id="id_tranche">
                        <option disabled> --Choisissez une tranche d'âge--</option>
                        <?php foreach ($tranches as $cle => $valeur) { ?>
                        <option value="<?=$valeur['id_tranche']?>"><?=$valeur['valeur_tranche']?></option>
                        <?php
                        }
                        ?>
                </select>
                

                <label for="photoToUpload">Photo :</label>
                <input type="file" name="photoToUpload" id="photoToUpload">

                        <div class="input-submit">
                <input type="submit" value="Envoyer">
                </div>

            </form>
        </div>

    </div>
</div>
</main>

<?php

include('assets/footer.php');

?>