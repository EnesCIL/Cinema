<?php ob_start() ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> acteur </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Genre</th>

        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $genre){ ?>
                <tr>
                    <td><?= $genre["nomGenre"] ?></td>
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


$titre = "Liste des Acteurs";
$titre_secondaire = "Liste des Acteurs";
$contenu = ob_get_clean();
require "view/template.php";
