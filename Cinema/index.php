<?php

use Controller\CinemaController;

spl_autoload_register(function($class_name){
<<<<<<< HEAD
    include $class_name . '.php';
=======
    include $class_name .'.php';
>>>>>>> febbed456577a74a5c5a2f58d276711c6db4a411
});

$ctrlCinema = new CinemaController();

<<<<<<< HEAD
$id = (isset($_GET["id"])) ? $_GET["id"] : null;

=======
>>>>>>> febbed456577a74a5c5a2f58d276711c6db4a411
if(isset($_GET["action"])){
    switch ($_GET["action"]){

        case "listFilms" : $ctrlCinema->listFilms();break;
<<<<<<< HEAD
        case "detailFilm" : $ctrlCinema->detailFilm($id);break;
        case "listActeurs" : $ctrlCinema->listActeurs();break;
        case "detailActeur" : $ctrlCinema->detailActeur($id);break;
=======
        case "listActeurs" : $ctrlCinema->listActeurs();break;
>>>>>>> febbed456577a74a5c5a2f58d276711c6db4a411
    }
}

?>