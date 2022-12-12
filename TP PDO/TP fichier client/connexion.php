

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux videos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700&family=Zen+Dots&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>

</head>
<?php
include('Elements/header.php');

?>

<?php
if (!empty($_POST)) {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $pdo->prepare("SELECT * FROM users WHERE login = '$_POST[login]'");
            $sth->execute();
            $tableau = $sth->fetchAll();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        // foreach ($tableau as $cle => $valeur) {
             if ($tableau[0]['password'] == $password) {
                    $_SESSION['logged'] = true;
                    header('location: espacemembre.php');
                } elseif ($tableau[0]['login'] != $login) {
                    $_SESSION['message'] = "Le login n'est pas bon";
                    $_SESSION['logged'] = false;
                    header('location: login.php');
                } else {
                    $_SESSION['logged'] = false;
                    $_SESSION ['message']= "Saisie incorrecte 2";
                    header('location: login.php');
            // }
            } 
    } else {
        $_SESSION['logged'] = false;
        $_SESSION['message'] = "Saisie incorrecte";
        header('location: login.php');
    }
} else {
    $_SESSION['logged'] = false;
    $_SESSION ['message']= "Veuillez entrer un login et un mot de passe";
    header('location: login.php');
    

}
// var_dump($_SESSION['logged']);



// header('location: login.php');
?>

<body>


    <div class="container">

        <?php






        ?>


    </div>
</body>

</html>