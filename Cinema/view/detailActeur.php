<?php ob_start() ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> acteur </p>

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
            foreach($requete->fetchAll() as $acteur){ ?>
                <tr>
                    <td><?= $acteur["nom"] ?></td>
                    <td><?= $acteur["prenom"] ?></td>
                    <td><?= $acteur["sexe"] ?></td>
                    <td><?= $acteur["dateDeNaissance"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php


$titre = "Liste des Acteurs";
$titre_secondaire = "Liste des Acteurs";
$contenu = ob_get_clean();
require "view/template.php";
