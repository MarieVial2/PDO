<?php

include('assets/header.php');

?>

<div class="container">
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <h3>Ajouter une section :</h3>
            <form action="ajoutSection.php" method="POST" enctype="multipart/form-data">

                <label for="nom">Nom de la section :</label>
                <input type="text" name="nom_section" id="nom">

                <label for="sport">Sport :</label>
                <input type="text" name="sport" id="sport">

                <label for="description_section">Description:</label>
                <textarea name="description_section" id="description_section" cols="30" rows="10"></textarea>


                <label for="photoToUpload">Photo de la section:</label>
                <input type="file" name="photoToUpload" id="photoToUpload">


                <input type="submit" value="Envoyer">


            </form>
        </div>

    </div>
</div>


<?php

include('assets/footer.php');

?>