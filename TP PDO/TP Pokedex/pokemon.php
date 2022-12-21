<?php

include('assets/header.php');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=pokedex;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM pokemon INNER JOIN pokemon_type ON pokemon.id_pokemon = pokemon_type.id_pokemon
    INNER JOIN `type` ON `type`.id_type = pokemon_type.id_type");
    $sth->execute();
    $tableau = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>

<main>
    <div class="container">
        <div class="container-page">
            <?php if ($_SESSION['logged']) { 
                ?>
            <div class="row">
                <div class="row-bouton">
                <a href="ajout-pokemon.php"><button type="submit" class="btn btn-danger">Ajouter un pokémon</button></a>
            </div></div>
            <?php
            }
            ?>
            <div class="row">
        <table class="table table-striped table-danger">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Type</th>
                    <th scope="col">Image</th>
                    <th scope="col">+ d'infos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($tableau as $key => $value) {
                        ?>
                <tr>
                    <th scope="row"><?=$value['numero_pokemon']?></th>
                    <td><?=$value['nom_pokemon']?></td>
                    <td><div style="color: <?=$value['couleur_type']?>;"><?=$value['nom_type']?></div></td>
                    <td><div id="icone-pokemon" style="background-image: url(<?=$value['image_pokemon']?>);"></div></td>
                    <td><form action="fiche-pokemon.php" method="POST"> 
                        <input type="hidden" name="id_pokemon" value="<?=$value['id_pokemon']?>">
                        <button type="submit" class="btn btn-danger">Voir la fiche</button>
                    </form></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</div>
    </div></div>
</main>




<?php

include('assets/footer.php');

?>