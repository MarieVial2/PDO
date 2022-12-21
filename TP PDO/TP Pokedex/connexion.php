<?php

include('assets/header.php');

?>
<div class="container">
    <div class="form-container">
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <h3>Connexion :</h3>
            <form action="login.php" method="POST">

            <?php
            
            if (isset($_SESSION['message'])) {
                ?>
                <p><?=$_SESSION['message']?>
                </p>
                <?php
            }
            unset($_SESSION['message']);
            unset( $_SESSION['logged']);

            session_destroy();
                ?>
                <a href="inscription.php">Nouveau membre ?</a>
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo">

                

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password">


                <input type="submit" value="Envoyer">


            </form>
        </div>

    </div>
</div></div>


<?php

include('assets/footer.php');

?>