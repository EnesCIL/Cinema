<?php ob_start() ?>

<h1>AJOUTER</h1>
    <form method="POST" action="index.php?action=ajouterGenre">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre">


        <input type="submit" value="envoyer">
        
    </form>
    <form method="POST" action="index.php?action=ajouterRealisateur">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
        <label for="nom">Prenom</label>
        <input type="text" name="prenom" id="prenom">

        <input type="submit" value="envoyer">
        
    </form>


<?php

$titre = "Home";
$titre_secondaire = "Menu";
$contenu = ob_get_clean();
require "view/template.php";

