<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<div class="container">
        <h1>Test upload</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input id="nom_table" name="nom_table" type="text" required placeholder="Du texte ...">
            <label for="fileToUpload">Image à transférer :</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="transférer l'image" name="submit">
        </form>




        <?php
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=testupload;port=3306', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sth = $pdo->prepare("SELECT * FROM `testupload`.`tabletest`");
            $sth->execute();


            $resultat = $sth->fetchAll();

            foreach ($resultat as $key => $value) {
        ?>
        <div class="container">
            <h3><?php echo $value['nom_table']; ?></h3>
            <img src="<?= $value['image_table']; ?>" alt="<?= $value['nom_table'] ?>">
        </div>

        <?php

            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        ?>
    </div>

</body>

</html>