<?php

include('header.php');

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["logoToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["logoToUpload"]["tmp_name"]);
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

  if ($_FILES["logoToUpload"]["size"] > 500000) {
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
      if (move_uploaded_file($_FILES["logoToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["logoToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
}
    }


$pdo = new PDO('mysql:host=localhost;dbname=sportco;port=3306','root','',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if ($_POST) {

    $nom = $_POST['nom'];
    $stade = $_POST['stade'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['codePostal'];
    $sport = $_POST['sport'];
    $niveau = $_POST['niveau'];
    $logo = 'uploads/'. $_FILES['logoToUpload']['name'];

    if ($nom != "") {
        $req1 = $pdo->prepare("
        INSERT INTO equipes (nom, stade, ville, codepostal, sport, niveau, logo)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $req1->execute([$nom, $stade, $ville, $codePostal, $sport, $niveau, $logo]);
        

}
}



header('location: index.php');



include('footer.php');

?>