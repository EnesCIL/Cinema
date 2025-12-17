
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <nav class="uk-navbar-container" uk-navbar uk-striped></nav>
    <!-- Le titre secondaire et le contenu principal (dans listFilms) -->
    <div id="wrapper" class="uk-container-expand">
        <main>
            <div id ="contenu">
                <h1 class="uk-heading-divider">PDO Cinema</h1>
                <h2 class="uk-heading-bullet"><?= $titre_secondaire?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
</body>
</html>