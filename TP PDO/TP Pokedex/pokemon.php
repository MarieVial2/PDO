<?php

include('assets/header.php');

$coordonnees = 'mysql:host=localhost;dbname=pokedex;port=3306';
$login = 'root';
$password = '';
try {
    $pdo = new PDO($coordonnees, $login, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT DISTINCT pokemon.id_pokemon, numero_pokemon, nom_pokemon, image_pokemon FROM pokemon INNER JOIN pokemon_type ON pokemon.id_pokemon = pokemon_type.id_pokemon
    INNER JOIN `type` ON `type`.id_type = pokemon_type.id_type ORDER BY numero_pokemon ");
    $sth->execute();
    $pokemons = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


try {
    $pdo = new PDO('mysql:host=localhost;dbname=pokedex;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    foreach ($pokemons as $cle2 => $valeur2) {
        
        $id_pokemon = $pokemons[$cle2]['id_pokemon'];

        $sth2 = $pdo->prepare("SELECT nom_type, couleur_type FROM `type` INNER JOIN pokemon_type ON `type`.id_type = pokemon_type.id_type
        INNER JOIN pokemon ON  pokemon.id_pokemon = pokemon_type.id_pokemon WHERE pokemon.id_pokemon = $id_pokemon");
        $sth2->execute();
        $tableau2 = $sth2->fetchAll();
        $pokemons[$cle2]['types'] = $tableau2;
    }   
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}




?>

<main>
    <div class="container">
        <div class="container-page">
            <?php if (isset($_SESSION['logged'])) { 
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
                    foreach ($pokemons as $key_pokemon => $informations_pokemon) {
                        ?>
                <tr>
                    <th scope="row"><?=$informations_pokemon['numero_pokemon']?></th>
                    <td><?php
                    $nom_pokemon2 = $informations_pokemon['nom_pokemon'];
                    echo utf8_encode($nom_pokemon2);?></td>
                    <td>
                    <?php
                    foreach($informations_pokemon['types'] as $key_type => $informations_type) {
                        ?>
                    <div style="color: <?=$informations_type['couleur_type']?>;"><?=$informations_type['nom_type']?></div>
                    <?php
                    }
                    ?>
                    </td>
                    <td><div id="icone-pokemon" style="background-image: url('<?=$informations_pokemon['image_pokemon']?>');"></div></td>
                    <td><form action="fiche-pokemon.php" method="POST"> 
                        <input type="hidden" name="id_pokemon" value="<?=$informations_pokemon['id_pokemon']?>">
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