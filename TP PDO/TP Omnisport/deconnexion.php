<?php

session_start();

if (isset($_SESSION['nom'])) {





unset($_SESSION['nom']);
unset($_SESSION['prenom']);
unset( $_SESSION['logged']);

session_destroy();
}
header('location: index.php');

?>