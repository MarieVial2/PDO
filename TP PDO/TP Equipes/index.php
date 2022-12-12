<?php

include('header.php');

?>

<div class="container">
    <?php
    
    if (isset($_SESSION['logged'])) {
        if ($_SESSION['logged'] == true) { ?>
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <h3>Ajouter une équipe :</h3>
            <form action="formEquipe.php" method="POST" enctype="multipart/form-data">

                    <label for="nom">Nom de l'équipe :</label>
                    <input type="text" name="nom" id="nom">

                    <label for="stade">Stade :</label>
                    <input type="text" name="stade" id="stade">

                    <label for="ville">Ville :</label>
                    <input type="text" name="ville" id="ville">

                    <label for="codePostal">Code postal :</label>
                    <input type="text" name="codePostal" id="codePostal">

                    <label for="sport">Sport :</label>
                    <input type="text" name="sport" id="sport">

                    <label for="niveau">Niveau :</label>
                    <input type="text" name="niveau" id="niveau">

                    <label for="logoToUpload">Logo :</label>
                    <input type="file" name="logoToUpload" id="logoToUpload">

                      
                    <input type="submit" value="Envoyer">


            </form>
        </div>

    </div>
<?php }
    } ?>
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=sportco;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM equipes");
    $sth->execute();
    $tableau = $sth->fetchAll();

    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

foreach ($tableau as $key => $valeur) {
?>
    <div class="row">
        <div class="col-md-12">
        
        <h4><img src="<?=$valeur['logo']?>" alt=""><?=$valeur['nom']?></h4>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12 ">
        <p>Ville : <?=$valeur['ville']?></p>
        <p>Code Postal : <?=$valeur['codepostal']?></p>
        <p>Stade : <?=$valeur['stade']?></p>
        <p>Sport : <?=$valeur['sport']?></p>
        <p>Niveau : <?=$valeur['niveau']?></p>
        </div>
    </div>
    <div class="row bloc-info">
        <?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=sportco;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sth2 = $pdo->prepare("SELECT * FROM joueurs WHERE equipe_id = $valeur[id]");
    $sth2->execute();
    $tableau2 = $sth2->fetchAll();

    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
        foreach ($tableau2 as $key => $value) {
            ?>
            <div class="card" style="width: 12rem;">
  
  <div class=" photo" alt="..." style="background-image: url('<?= $value['photo']?>'); background-position: center; background-size: cover;"> </div>
  <div class="card-body">
    <h5 class="card-title"><?= $value['nom']." ". $value['prenom']?></h5>
    <p class="card-text"><?= $value['age']. " ans"?></p>
  </div>
</div>
<?php

        }
        ?>
    </div>
    <?php
}
?>
</div>






<?php

include('footer.php');

?>