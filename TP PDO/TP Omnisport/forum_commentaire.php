<?php

include('assets/header.php');

if (!empty($_POST)) {
$_SESSION['id_message_forum'] = $_POST['id_message'];
$_SESSION['id_licencie_forum'] = $_POST['id_licencie'];
}
// Recupere les infos du message 
try {
    $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM `message` WHERE $_SESSION[id_message_forum] = id_message");
    $sth->execute();
    $tableau = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
// Recupere les infos du licencie auteur du message
try {
    $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM `message` INNER JOIN licencie ON `message`.id_licencie = licencie.id_licencie WHERE $_SESSION[id_licencie_forum] = licencie.id_licencie");
    $sth->execute();
    $tableau2 = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
<div class="container">
    <div class="row">
        <div class="message_display">
            <!-- Display du message -->
            <h4><?= $tableau[0]['titre'] ?></h4>
            <h6><?= $tableau[0]['date_post'] ?> </h6>
            <h6>
                <div class="avatar" style="background-image : url(<?= $tableau2[0]['photo'] ?>)"></div> <?= $tableau2[0]['nom_licencie'] . " " . $tableau2[0]['prenom'] ?>
            </h6>
            <p><?= $tableau[0]['contenu_message'] ?></p>


        </div>

        <div class="commentaires">
            <?php
            if (!empty($_SESSION['id'])) {
            ?>
            <div class="col-md-6">
                <form action="ajoutCommentaire.php" method="POST">


                    <label for="contenu_commentaire">Commentaire :</label>
                    <textarea name="contenu_commentaire" id="contenu_commentaire" cols="30" rows="6"></textarea>

                    <input type="hidden" value="<?= $_SESSION['id'] ?>" name="id_licencie">
                    <input type="hidden" value="<?= $tableau[0]['id_message'] ?>" name="id_message">


                    <input type="submit" value="Envoyer">
                </form>
            </div>
        
            <?php
            }
            // Recupération du commentaire et de ses informations
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $pdo->prepare("SELECT * FROM commentaire INNER JOIN licencie ON commentaire.id_licencie = licencie.id_licencie INNER JOIN `message`ON `message`.id_message = commentaire.id_message WHERE `message`.id_message = $_SESSION[id_message_forum] ORDER BY date_comm DESC");
                $sth->execute();
                $tableau3 = $sth->fetchAll();
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            foreach ($tableau3 as $cle => $valeur) {
            ?>
<!-- Display du commentaire -->
                <div class="commentaire">
                    <h6><?= $valeur['date_comm'] ?> </h6>
                    <h6>
                        <div class="avatar" style="background-image : url(<?= $valeur['photo'] ?>)"></div> <?= $valeur['nom_licencie'] . " " . $valeur['prenom'] ?>
                    </h6>
                    <p><?= $valeur['contenu_commentaire'] ?></p>
                </div>
            <?php
            }
            ?>

            

            <div>

            </div>
        </div>

    </div>
</div>
<?php

include('assets/footer.php');

?>