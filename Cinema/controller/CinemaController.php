<?php
namespace Controller ;
use Model\Connect;

class CinemaController{

    public function listFilms(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
<<<<<<< HEAD
            SELECT titre, anneeSortie
            FROM film
        ");
        require "view/listFilms.php";
            
    }

    public function detailFilm($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT titre, anneeSortie, duree, resumeFilm, note FROM film WHERE id_film = :id");
        $requete->execute(["id" => $id]);
        require "view/detailFilm.php";
    }

    public function listActeurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT nom, prenom
            FROM acteur
        ");
        require "view/listActeurs.php";
            
    }
    
    public function detailActeur($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT nom, prenom, sexe, dateDeNaissance FROM acteur WHERE id_acteur = :id");
        $requete->execute(["id" => $id]);
        require "view/detailActeur.php";
    }



}


=======
            SELECT titre, annee_sortie
            FROM film
            ");

    require "view/listFilms.php";
}
}
>>>>>>> febbed456577a74a5c5a2f58d276711c6db4a411
?>