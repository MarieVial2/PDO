<?php

include('assets/header.php');

$pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306','root','',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


if (isset($_POST)) {

    $contenu_commentaire = $_POST['contenu_commentaire'];
    $id_message = $_POST['id_message'];
    $id_licencie = $_POST['id_licencie'];
    


    if ($contenu_commentaire != "") {
        $req1 = $pdo->prepare("
        INSERT INTO commentaire (contenu_commentaire, id_message, id_licencie)
        VALUES (?, ?, ?)
        ");
        $req1->execute([$contenu_commentaire, $id_message, $id_licencie]);
        

} 
}

header('location: forum_commentaire.php');
include('assets/footer.php');

?>