<?php

include('assets/header.php');

$pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306','root','',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if ($_POST) {

    $titre_message = $_POST['titre_message'];
    $contenu_message = $_POST['contenu_message'];
    $id_licencie = $_POST['id_licencie'];
    


    if ($contenu_message != "") {
        $req1 = $pdo->prepare("
        INSERT INTO message (titre, contenu_message, id_licencie)
        VALUES (?, ?, ?)
        ");
        $req1->execute([$titre_message, $contenu_message, $id_licencie]);
        

} else {
        $_SESSION['message_forum'] = "Veuillez remplir tous les champs";
}
}

header('location: forum.php');
include('assets/footer.php');

?>