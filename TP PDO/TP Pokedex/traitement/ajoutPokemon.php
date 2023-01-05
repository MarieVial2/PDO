<?php

include('../assets/header.php');


$target_dir = "../uploads/";
$target_name = str_replace(" ", "_", basename($_FILES["photoToUpload"]["name"]));
$target_name = str_replace("(", "-", $target_name);
$target_name = str_replace(")", "-", $target_name);
$target_file = $target_dir . $target_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["photoToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
echo "File is not an image.";
    $uploadOk = 0;
}
}
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  } 

  if ($_FILES["photoToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  } 

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
} 

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["photoToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["photoToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
}
    }


    $pdo = new PDO('mysql:host=localhost;dbname=pokedex;port=3306','root','',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if ($_POST) {

    $numero = $_POST['numero'];
    $nom_pokemon = htmlspecialchars($_POST['nom_pokemon']);
    $image_pokemon = 'uploads/'. $_FILES['photoToUpload']['name'];
    // $avatar = $target_file;
    $description_pokemon = $_POST['description_pokemon'];
    $taille_pokemon = $_POST['taille_pokemon'];
    $poids_pokemon = $_POST['poids_pokemon'];
    $id_utilisateur = $_SESSION['id'];

    if ($_POST['nom_pokemon'] === "Salamèche") {
        echo true;
    } else {
        echo false;
    }


    if ($nom_pokemon != "") {
        $req1 = $pdo->prepare("
        INSERT INTO pokemon (numero_pokemon, nom_pokemon, image_pokemon, description_pokemon, taille, poids, id_utilisateur)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $req1->execute([$numero, $nom_pokemon, $image_pokemon, $description_pokemon, $taille_pokemon, $poids_pokemon, $id_utilisateur]);
        

}
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=pokedex;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Salamèche" == $nom_pokemon;
    $sth = $pdo->prepare("SELECT * FROM pokemon WHERE numero_pokemon = '$numero'");
    $sth->execute();
    $tableau = $sth->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if ($_POST) {

    $id_pokemon = $tableau[0]['id_pokemon'];
    $id_type1 = $_POST['type1'];
    $id_type2 = $_POST['type2'];



    if (!empty($id_type1)) {
        $req1 = $pdo->prepare("
        INSERT INTO pokemon_type (id_pokemon, id_type)
        VALUES (?, ?)
        ");
        $req1->execute([$id_pokemon, $id_type1]);


    }
    var_dump($id_type2);
    if (!empty($id_type2)) {
        $req2 = $pdo->prepare("
            INSERT INTO pokemon_type (id_pokemon, id_type)
            VALUES (?, ?)
            ");
        $req2->execute([$id_pokemon, $id_type2]);


    }
}


header('location: ../pokemon.php');

include('../assets/footer.php');

?>