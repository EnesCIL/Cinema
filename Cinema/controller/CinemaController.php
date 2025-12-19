<?php
namespace Controller ;
use Model\Connect;

class CinemaController{

    public function listFilms(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT titre, anneeSortie, id_film
            FROM film
        ");
        require "view/listFilms.php";
            
    }

    public function home(){
        require "view/home.php";
    }

    public function detailFilm($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT titre, anneeSortie, duree, resumeFilm, note FROM film WHERE id_film = :id");
        $requete2 = $pdo->prepare(
            "SELECT DISTINCT far.id_acteur, f.id_realisateur, a.nom, a.prenom, r.nomPersonnage
            FROM film f 
            INNER JOIN film_acteur_role far ON far.id_film = f.id_film 
            INNER JOIN acteur a ON a.id_acteur = far.id_acteur 
            INNER JOIN role r ON r.id_role = far.id_role
            WHERE far.id_film = :id");
        $requete3 = $pdo->prepare(
            "SELECT r.nom, r.prenom, f.id_film 
            FROM film f 
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            WHERE f.id_film = :id");
        $requete->execute(["id" => $id]);
        $requete2->execute(["id" => $id]);
        $requete3->execute(["id" => $id]);-
        require "view/detailFilm.php";
    }

    public function listActeurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT nom, prenom, id_acteur
            FROM acteur
        ");
        require "view/listActeurs.php";
            
    }
    
    public function detailActeur($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT nom, prenom, sexe, dateDeNaissance FROM acteur  WHERE id_acteur = :id");
        $requete->execute(["id" => $id]);
        require "view/detailActeur.php";
    }

    public function listRealisateurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT nom, prenom, id_realisateur
            FROM realisateur
        ");
        require "view/listRealisateurs.php";
            
    }

    public function detailRealisateur($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT nom, prenom FROM realisateur WHERE id_realisateur = :id");
        $requete2 = $pdo->prepare("SELECT id_film, titre FROM film WHERE id_realisateur = :id");
        $requete->execute(["id" => $id]);
        $requete2->execute(["id" => $id]);
        require "view/detailRealisateur.php";
    }

    public function listGenres(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT nomGenre, id_genre
            FROM genre
        ");
        require "view/listGenres.php";
            
    }

    public function detailGenre($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT nomGenre FROM genre WHERE id_genre = :id");
        $requete2 = $pdo->prepare("SELECT fg.id_film, f.titre FROM film_genre fg INNER JOIN film f ON fg.id_film = f.id_film WHERE id_genre = :id");
        $requete->execute(["id" => $id]);
        $requete2->execute(["id" => $id]);
        
        require "view/detailGenre.php";
    }

    public function ajouter(){
        require "view/ajouter.php";
    }

    public function ajouterGenre(){
        $titre = $_POST["titre"];
        if($titre)
        {
            $pdo = connect::seConnecter();
            $requete = $pdo->prepare("INSERT INTO genre (nomGenre) VALUES (:nom)");
            $requete->execute(["nom" => $titre]);

            /* header('Location: index.php?action=detailGenre&id=' . $pdo->lastInsertId()); */
            header('Location: index.php?action=listGenres');
        }
        
        require "view/ajouter.php";
    }
    
    public function ajouterRealisateur(){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        if($nom && $prenom)
        {
            $pdo = connect::seConnecter();
            $requete = $pdo->prepare("INSERT INTO realisateur (nom,prenom) VALUES (:nom, :prenom)");
            $requete->execute(["nom" => $nom, "prenom" => $prenom]);
            
            /* header('Location: index.php?action=detailGenre&id=' . $pdo->lastInsertId()); */
            header('Location: index.php?action=listRealisateurs');
        }
        
        require "view/ajouter.php";
    }

    //film recuper les films et mettre dans un selecteur installer gitlens
}


?>