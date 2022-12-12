<?php

include('header.php');

?>

<div class="container">
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <h3>Se connecter :</h3>
            <form action="connexion.php" method="POST" >

             <?php
             if (isset($_SESSION['message'])) { ?>
                <p> <?= $_SESSION['message']?></p>
             <?php
             }
             ?>

                <label for="login">Login :</label>
                <input type="text" name="login" id="login">

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password">

                <input type="submit" value="Envoyer">


</form>
</div>

</div>
</div>


<?php

include('footer.php');

?>