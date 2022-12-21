<?php

include('assets/header.php');

?>


<div class="container"> 
    <div class="form-container">
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <h3>Ajouter un pokémon :</h3>
            <form action="traitement/ajoutPokemon.php" method="POST" enctype="multipart/form-data">

                <label for="numero">Numéro :</label>
                <input type="text" name="numero" id="numero">

                <label for="nom_pokemon">Nom :</label>
                <input type="text" name="nom_pokemon" id="nom_pokemon">

                <label for="Description">Description :</label>
                <textarea name="description_pokemon" id="Description" cols="30" rows="10"></textarea>

                <label for="taille_pokemon">Taille :</label>
                <input type="text" name="taille_pokemon" id="taille_pokemon">

                <label for="poids_pokemon">Poids :</label>
                <input type="text" name="poids_pokemon" id="poids_pokemon">
                

                <label for="photoToUpload">Image :</label>
                <input type="file" name="photoToUpload" id="photoToUpload">


                <input type="submit" value="Envoyer">


            </form>
        </div>

    </div>
</div>
</div>


<?php

include('assets/footer.php');

?>