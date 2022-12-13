<?php

include('assets/header.php');

?>


<div class="container">
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <h3>Ajouter une section :</h3>
            <form action="ajoutMembre.php" method="POST" enctype="multipart/form-data">

                <label for="nom">Nom :</label>
                <input type="text" name="nom_licencie" id="nom">

                

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom">

                <label for="email">E-mail :</label>
                <input type="email" name="email" id="email">

                <label for="age">Age :</label>
                <input type="number" name="age" id="age">

                <label for="description_licencie">Description:</label>
                <textarea name="description_licencie" id="description_licencie" cols="30" rows="10"></textarea>


                <label for="photoToUpload">Photo :</label>
                <input type="file" name="photoToUpload" id="photoToUpload">

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password">


                <input type="submit" value="Envoyer">


            </form>
        </div>

    </div>
</div>


<?php

include('assets/footer.php');

?>