<?php

include('assets/header.php');

$id = $_POST['id'];
try {
    $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $pdo->prepare("SELECT * FROM section WHERE id_section = $id");
    $sth->execute();
    $tableau = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>


<div class="container">
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <h3>Modifier une section :</h3>
            <form action="modification.php" method="POST" enctype="multipart/form-data">

                <label for="nom">Nom de la section :</label>
                <input type="text" name="nom_section" id="nom" value="<?=$tableau[0]['nom_section']?>">

                <label for="sport">Sport :</label>
                <input type="text" name="sport" id="sport" value="<?=$tableau[0]['sport']?>">

                <label for="description_section">Description:</label>
                <textarea name="description_section" id="description_section" cols="30" rows="10"><?=$tableau[0]['description_section']?></textarea>


                <label for="photoToUpload">Photo de la section:</label>
                <input type="file" name="photoToUpload" id="photoToUpload">

                <input type="hidden" value="<?=$tableau[0]['id_section']?>" name="id">


                <input type="submit" value="Envoyer">


            </form>
        </div>

    </div>
</div>
<?php

include('assets/footer.php');

?>