--a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur
SELECT f.titre, f.anneeSortie, DATE_FORMAT(SEC_TO_TIME(duree * 60), '%Hh%imin') AS duree, r.nom , r.prenom
FROM film f
INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur

--b. Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)
SELECT f.titre , f.duree
FROM film f
WHERE duree > 135
ORDER BY f.duree DESC 

--c. Liste des films d’un réalisateur (en précisant l’année de sortie)SELECT f.titre , f.anneeSortie, r.nom, r.prenom
SELECT f.titre , f.anneeSortie, r.nom, r.prenom
FROM film f
INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
WHERE r.id_realisateur = 1


--d. Nombre de films par genre (classés dans l’ordre décroissant)
SELECT g.nomGenre, COUNT(fg.id_film) AS nombre_films
FROM genre g
INNER JOIN film_genre fg ON g.id_genre = fg.id_genre
GROUP BY g.nomGenre
ORDER BY nombre_films DESC

--e. Nombre de films par réalisateur (classés dans l’ordre décroissant)
SELECT  r.nom,r.prenom,COUNT(f.id_film) AS nombre_films
FROM film f
INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
GROUP BY r.id_realisateur, r.nom, r.prenom
ORDER BY nombre_films DESC

--f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe
SELECT a.nom, a.prenom, a.sexe, f.titre
FROM film f
INNER JOIN film_acteur_role far ON far.id_film = f.id_film
INNER JOIN acteur a ON a.id_acteur = far.id_acteur
WHERE f.id_film = 6

--g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie (du film le plus récent au plus ancien)
SELECT f.titre,r.nomPersonnage, f.anneeSortie
FROM film f
INNER JOIN film_acteur_role far ON far.id_film = f.id_film
INNER JOIN acteur a ON a.id_acteur = far.id_acteur
INNER JOIN role r ON r.id_role = far.id_acteur
WHERE a.id_acteur = 10 
ORDER BY  f.anneeSortie DESC 

--h. Liste des personnes qui sont à la fois acteurs et réalisateurs
-- besoin d'un nouveau reliement ?
SELECT r.nom,r.prenom, f.titre ,a.nom,r.prenom  
FROM film f
INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
INNER JOIN film_acteur_role far ON far.id_film = f.id_film
INNER JOIN acteur a ON a.id_acteur = far.id_acteur

--i. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)
SELECT f.titre, f.anneeSortie 
FROM film f
WHERE f.anneeSortie > 2020

--j. Nombre d’hommes et de femmes parmi les acteurs
SELECT a.sexe,COUNT(*) AS nombre
FROM acteur a
GROUP BY a.sexe

--k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)
--FLOOR ->Donne l’âge révolu (âge complet) , DATEDIFF(CURDATE(), dateDeNaissance) -> Donne le nombre total de jours depuis la naissance.
SELECT a.nom,a.prenom, a.dateDeNaissance, FLOOR(DATEDIFF(CURDATE(), a.dateDeNaissance) / 365)  AS age
FROM acteur a
WHERE FLOOR(DATEDIFF(CURDATE(), a.dateDeNaissance) / 365) > 50;


--l. Acteurs ayant joué dans 3 films ou plus
SELECT  a.nom, a.prenom, COUNT(far.id_film) AS nb_films
FROM acteur a
INNER JOIN film_acteur_role far ON a.id_acteur = far.id_acteur
GROUP BY a.id_acteur, a.nom, a.prenom
HAVING COUNT(far.id_film) >= 3