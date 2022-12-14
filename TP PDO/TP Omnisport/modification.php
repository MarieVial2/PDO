<?php

include('assets/header.php');

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["photoToUpload"]["name"]);
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


$newnom = $_POST['nom_section'];
$newsport = $_POST['sport'];
$newdescription = $_POST['description_section'];
$newphoto = 'uploads/'. $_FILES['photoToUpload']['name'];

$id=$_POST['id'];
if (!empty($_FILES['photoToUpload']['name'])) {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //On prépare la requête et on l'exécute
        $sth = $pdo->prepare("
        UPDATE section
        SET photo_section='$newphoto'
        WHERE id_section = $id
        ");
        
        $sth->execute();
        
    
        }
        catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
        }
}

try{
    $pdo = new PDO('mysql:host=localhost;dbname=omnisport;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //On prépare la requête et on l'exécute
    $sth = $pdo->prepare("
    UPDATE section
    SET nom_section='$newnom', sport='$newsport', description_section='$newdescription'
    WHERE id_section = $id
    ");
    
    $sth->execute();
    

    }
    catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    }

include('assets/footer.php');

?>