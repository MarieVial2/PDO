<?php

include('../assets/header.php');


$target_dir = "uploads/";
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
      if (move_uploaded_file($_FILES["photoToUpload"]["tmp_name"], "../".$target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["photoToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
}
    }


    $pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306','root','',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if ($_POST) {

    $nom_produit = $_POST['nom_produit'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $photo = $target_file;
    $categorie = $_POST['id_categorie'];
    $tranche = $_POST['id_tranche'];
    $utilisateur = $_SESSION['id'];


    if ($nom_produit != "") {
        $req1 = $pdo->prepare("
        INSERT INTO produit (nom_produit, prix_produit, photo_produit, description_produit, id_categorie, id_tranche, id_utilisateur)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $req1->execute([$nom_produit, $prix, $photo, $description, $categorie, $tranche, $utilisateur]);
        

}
}





include('../assets/footer.php');

?>