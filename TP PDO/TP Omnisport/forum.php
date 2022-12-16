<?php

include('assets/header.php');

// Recupere les messages postés pour les afficher du plus récent au plus ancien
try {
    $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM `message` INNER JOIN licencie ON `message`.id_licencie = licencie.id_licencie ORDER BY date_post DESC");
    $sth->execute();
    $tableau = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}



?>

<div class="container">
    <div class="row">

        <?php
        if (isset($_SESSION['id'])) {
        ?>
            <div class="offset-md-4 col-md-4">
                <h3>Poster un message :</h3>
                <form action="ajoutForum.php" method="POST" enctype="multipart/form-data">

                    <label for="titre">Titre :</label>
                    <input type="text" name="titre_message" id="titre">

                    <label for="contenu_message">Contenu :</label>
                    <textarea name="contenu_message" id="contenu_message" cols="30" rows="10"></textarea>

                    <input type="hidden" value="<?= $_SESSION['id'] ?>" name="id_licencie">


                    <input type="submit" value="Envoyer">


                </form>
            </div>
        <?php
        }
        ?>
    </div>



    <div class="row">
        <div id="cartes_wrap">
            <?php
            // En cliquant sur le titre du message, envoi des infos du message et de l'auteur du message ?
            foreach ($tableau as $key => $valeur) { ?>
                <div class="carte_forum">
                    <form action="forum_commentaire.php" method="POST">
                        <input type="hidden" value="<?= $valeur['id_message'] ?>" name="id_message">
                        <input type="hidden" value="<?= $valeur['id_licencie'] ?>" name="id_licencie">
                        <button type="submit">
                            <!-- Display du message -->
                            <h5><?= $valeur['titre'] ?></h5>
                        </button>
                    </form>
                    
                    <h6><?= $valeur['date_post'] ?> </h6>
                    <h6>
                        <div class="avatar" style="background-image : url(<?= $valeur['photo'] ?>)"></div> <?= $valeur['nom_licencie'] . " " . $valeur['prenom'] ?>
                    </h6>
                    <p><?= $valeur['contenu_message'] ?></p>
                </div>

            <?php
            }
            ?>
        </div>


    </div>
</div>


<?php

include('assets/footer.php');

?>