<?php

include('assets/header.php');



try {
    $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM section WHERE id_section = $_POST[id]");
    $sth->execute();
    $tableau = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth2 = $pdo->prepare("SELECT * FROM licencie WHERE id_section = $_POST[id]");
    $sth2->execute();
    $tableau2 = $sth2->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


if (!empty($_SESSION)) {
$id = $_SESSION['id'];
    
try {
    $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sth3 = $pdo->prepare("SELECT * FROM licencie WHERE $id = id_licencie");
    $sth3->execute();
    $tableau3 = $sth3->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
}
?>


<main>
    <div class="container">
        <div class="row">
            <div id="presentation">
                <div id="modify">
                    <?php
                    if (isset($_SESSION['nom'])) {
                        if ($tableau3[0]['admin'] == 1) {
                ?>
                        <form action="section_modify.php" method="POST">
                            <input type="hidden" value="<?= $tableau[0]['id_section'] ?>" name="id">
                            <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>

                    <?php
                        }
                    }
                    ?>
                </div>
                <h4><?= $tableau[0]['nom_section'] ?></h4>
                <div id="photo_section" style="background-image: url(<?= $tableau[0]['photo_section'] ?>); background-size : cover; background-position : center"></div>
                <p><?= $tableau[0]['description_section'] ?></p>
            </div>
        </div>

        <div class="row">
            <h4>Lienciés de la section :</h4>
            <div id="cartes">
                <?php
                foreach ($tableau2 as $key => $value) {
                ?>
                    <div class="carte">
                        <div class="photo_licencie" style="background-image: url(<?= $value['photo'] ?>);">

                        </div>
                        <h4><?= $value['nom_licencie'] . " " . $value['prenom'] ?></h4>
                        <h5><?= $value['age'] . " ans" ?></h5>
                        <p><?= $value['description_licencie'] ?></p>

                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</main>
<?php

include('assets/footer.php');

?>