<?php

include('assets/header.php');

?>


<div class="container"> 
    <div class="form-container">
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <h3>S'inscrire :</h3>
            <form action="traitement/ajoutUtilisateur.php" method="POST" enctype="multipart/form-data">

                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo">

                <label for="email">E-mail :</label>
                <input type="email" name="email" id="email">
                

                <label for="photoToUpload">Avatar :</label>
                <input type="file" name="photoToUpload" id="photoToUpload">

                <label for="motdepasse">Mot de passe :</label>
                <input type="password" name="motdepasse" id="motdepasse">


                <input type="submit" value="Envoyer">


            </form>
        </div>

    </div>
</div>
</div>


<?php

include('assets/footer.php');

?>