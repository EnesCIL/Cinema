<?php ob_start() ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> realisateur </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>Date de naissance</th>

        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $realisateur){ ?>
                <tr>
                    <td><?= $realisateur["nom"] ?></td>
                    <td><?= $realisateur["prenom"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Films</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete2->fetchAll() as $film){ ?>
                <tr>
                    <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
                </tr>
        <?php } ?>
    </tbody>
</table>


<?php


$titre = "Liste des realisateur";
$titre_secondaire = "Liste des realisateur";
$contenu = ob_get_clean();
require "view/template.php";
