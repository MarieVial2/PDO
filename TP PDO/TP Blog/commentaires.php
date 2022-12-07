
<?php
if ($_POST) {
try {
        $pdo = new PDO('mysql:host=localhost;dbname=blog;port=3306', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $pdo->prepare("
    INSERT INTO `blog`.`commentaires` (auteur, commentaire, idPost)
    VALUES (?, ?, ?)
    ");
        $auteur = $_POST['auteur'];
        $commentaire = $_POST['commentaire'];
        $idPost = $_POST['idPost'];


        $sth->execute(
            [$auteur, $commentaire, $idPost]
        );
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

header('location: index.php');
    ?>