<?php ob_start() ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> acteurs </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $acteur){ ?>
                <tr>
                    <td><?= $acteur["nom"] ?></td>
                    <td><?= $acteur["prenom"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des Acteurs";
$titre_secondaire = "Liste des Acteurs";
$contenu = ob_get_clean();
require "view/template.php";

