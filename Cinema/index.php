<?php

use Controller\CinemaController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]){
        case "listFilms" : $ctrlCinema->listFilms();break;
        case "detailFilm" : $ctrlCinema->detailFilm($id);break;
        case "listActeurs" : $ctrlCinema->listActeurs();break;
        case "detailActeur" : $ctrlCinema->detailActeur($id);break;
        case "listRealisateurs" : $ctrlCinema->listRealisateurs();break;
        case "detailRealisateur" : $ctrlCinema->detailRealisateur($id);break;
        case "listGenres" : $ctrlCinema->listGenres();break;
        case "detailGenre" : $ctrlCinema->detailGenre($id);break;
        case "ajouter" : $ctrlCinema->ajouter();break;

        case "ajouterGenre" : $ctrlCinema->ajouterGenre(); break;
        case "ajouterRealisateur" : $ctrlCinema->ajouterRealisateur(); break;
        default : $ctrlCinema->home(); break;
    }
}else{
   $ctrlCinema->home();
 }

/*     @$keywords=$_GET["name"];
    @$valider=$_GET["valider"];
    if(isset($valider)&& ! empty(trim($keywords))){
        include("connexion.php");
        $res=$pdo->prepare("select descg from glossaire where desgc like '%$keywords%' ");
        include("view/template.php");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $tab = $res->fetchAll();
        $afficher='oui';

    } */

?>
