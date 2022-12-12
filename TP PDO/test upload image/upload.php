<?php
$pdo = new PDO('mysql:host=localhost;', 'root', '');
$sql = "CREATE DATABASE IF NOT EXISTS `testupload` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try {
  $pdo = new PDO('mysql:host=localhost;dbname=testupload;port=3306', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "CREATE TABLE IF NOT EXISTS `testupload`.`tabletest` ( 
      `id_table` INT NOT NULL AUTO_INCREMENT , 
      `nom_table` VARCHAR(250) NOT NULL , 
      `image_table` VARCHAR(250) ,    
      PRIMARY KEY (`id_table`)) ENGINE = InnoDB;";


  $pdo->exec($sql);
  echo 'Félicitations, la table a bien été créée !<br/>';
} catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
$uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
}
}


if (!empty($_POST)) {
    if (isset($_POST['nom_table'])) {
      try {
        $pdo = new PDO('mysql:host=localhost;dbname=testupload;port=3306', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
        $nom_table = $_POST['nom_table'];
        $image_table = "uploads/" . $_FILES["fileToUpload"]["name"];
  
        $sth = $pdo->prepare("
                       INSERT INTO tabletest(nom_table, image_table)
                       VALUES (:nom_table, :image_table)
                   ");
        $sth->execute(array(
          ':nom_table' => $nom_table,
          'image_table' => $image_table,
  
  
  
  
        ));
      } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }
    }
  }
  
  header("location: index.php");
?>