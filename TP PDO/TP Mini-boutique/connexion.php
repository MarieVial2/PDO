<?php

include('assets/header.php');

?>
<main>
<div class="container">
    <div class="row">
        <div class="offset-md-4 col-md-4">
            
            <form action="traitement/login.php" method="POST">
                <h3><i class="fa-solid fa-arrow-right"></i> Connexion :</h3>
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

                <label for="email">E-mail :</label>
                <input type="email" name="email" id="email">

                

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password">

                <div class="input-submit">
                <input type="submit" value="Envoyer">
                </div>

            </form>
        </div>

    </div>
</div>
</main>

<?php

include('assets/footer.php');

?>