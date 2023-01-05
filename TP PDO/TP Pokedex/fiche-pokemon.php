<?php

include('assets/header.php');

$id = $_POST['id_pokemon'];
$coordonnees = 'mysql:host=localhost;dbname=pokedex;port=3306';
$login = 'root';
$password = '';
try {
    $pdo = new PDO($coordonnees, $login, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM pokemon WHERE $id = pokemon.id_pokemon");
    $sth->execute();
    $pokemon = $sth->fetchAll();

    $sth2 = $pdo->prepare("SELECT nom_type, couleur_type FROM `type` INNER JOIN pokemon_type ON `type`.id_type = pokemon_type.id_type
        INNER JOIN pokemon ON  pokemon.id_pokemon = pokemon_type.id_pokemon WHERE pokemon.id_pokemon = $id");
        $sth2->execute();
        $types = $sth2->fetchAll();
        // $pokemon[0]['types'] = $types;



} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<div class="container">
    <div class="container-page">
        <div class="row">
            <div class="col-md-6">
                <div class="image-pokemon" style="background-image: url('<?=$pokemon[0]['image_pokemon']?>');"></div>
            </div>

            <div class="col-md-6">
                <h3><?=$pokemon[0]['nom_pokemon']?></h3>
                <p><strong>Taille : </strong><?=$pokemon[0]['taille']?></p>
                <p><strong>Poids : </strong><?=$pokemon[0]['poids']?></p>
                <p><strong>Description : </strong><?=$pokemon[0]['description_pokemon']?></p>
                 <p class="paragraphe-left"><strong>Type : </strong>
                <?php

                // Parcours de la boucle, ajout d'une virgule entre les types
                // foreach ($types as $cle => $informations) {

                //     echo $informations['nom_type'];
                //     if (array_search($informations, $types) != count($types) -1) {
                //         echo ", ";
                //     }

                // }

                // Parcours de la boucle, ajout d'une virgule entre les types
                for($i=0; $i<count($types); $i++) {
                    echo $types[$i]['nom_type'];
                    if ($i != count($types)-1) {
                        echo ", ";
                    }
                }
                ?>
               </p>

            </div>

        </div>

    </div>
</div>


<?php

include('assets/footer.php');

?>