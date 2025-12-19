<?php ob_start() ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNE SORTIE</th>
            <th>DUREE</th>
            <th>RESUME</th>
            <th>NOTE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $film){ ?>
                <tr>
                    <td><?= $film["titre"] ?></td>
                    <td><?= $film["anneeSortie"] ?></td>
                    <td><?= $film["duree"] ?></td>
                    <td><?= $film["resumeFilm"] ?></td>
                    <td><?= $film["note"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Acteur</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete2->fetchAll() as $acteur ){ ?>
                <tr>
                    <td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["nom"].' '.$acteur["prenom"] ?></a></td>
                    <td><?= $acteur["nomPersonnage"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Realisateur</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete3->fetchAll() as $realisateur){ ?>
                <tr>
                    <td><a href="index.php?action=detailRealisateur&id=<?= $realisateur["id_film"] ?>"><?= $realisateur["nom"].' '.$realisateur["prenom"] ?></a></td>
                </tr>
        <?php } ?>
    </tbody>
</table>


<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";
