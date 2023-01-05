<?php

include('../assets/header.php');


unset($_SESSION['logged']);
unset($_SESSION['nom']);
unset($_SESSION['prenom']);
unset($_SESSION['id']);

session_destroy();

include('../assets/footer.php');

header('location: ../index.php');


?>