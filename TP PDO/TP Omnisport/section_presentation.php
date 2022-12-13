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
?>


<main>
    <div class="container">
        <div class="row">
            <div id="presentation">
            <h4><?=$tableau[0]['nom_section']?></h4>
            <div id="photo_section" style="background-image: url(<?=$tableau[0]['photo_section']?>); background-size : cover; background-position : center"></div>
            <p><?=$tableau[0]['description_section']?></p>
            </div>
        </div>
    </div>

</main>
<?php

include('assets/footer.php');

?>