-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.4.3 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema`;

-- Listage de la structure de table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `dateDeNaissance` date DEFAULT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.acteur : ~10 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `nom`, `prenom`, `sexe`, `dateDeNaissance`) VALUES
	(1, 'DiCaprio', 'Leonardo', 'M', '1974-11-11'),
	(2, 'Washington', 'Denzel', 'M', '1954-12-28'),
	(3, 'Robbie', 'Margot', 'F', '1990-07-02'),
	(4, 'Reeves', 'Keanu', 'M', '1964-09-02'),
	(5, 'Johansson', 'Scarlett', 'F', '1984-11-22'),
	(6, 'Hardy', 'Tom', 'M', '1977-09-15'),
	(7, 'Bale', 'Christian', 'M', '1974-01-30'),
	(8, 'Blunt', 'Emily', 'F', '1983-02-23'),
	(9, 'Jordan', 'Michael B.', 'M', '1987-02-09'),
	(10, 'Murphy', 'Cillian', 'M', '1976-05-25');

-- Listage de la structure de table cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL DEFAULT '0',
  `anneeSortie` int NOT NULL DEFAULT (0),
  `duree` int NOT NULL DEFAULT (0),
  `resumeFilm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `note` int NOT NULL DEFAULT (0),
  `afficheFilm` varchar(255) NOT NULL DEFAULT '0',
  `id_realisateur` int DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `FK_film_realisateur` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.film : ~10 rows (environ)
INSERT INTO `film` (`id_film`, `titre`, `anneeSortie`, `duree`, `resumeFilm`, `note`, `afficheFilm`, `id_realisateur`) VALUES
	(1, 'Inception', 2010, 148, 'Des voleurs infiltrent les rêves pour implanter une idée.', 5, 'inception.jpg', 1),
	(2, 'Blade Runner 2049', 2017, 164, 'Un réplicant découvre un secret menaçant l’humanité.', 2, 'br2049.jpg', 2),
	(3, 'Jurassic Park', 1993, 127, 'Un parc de dinosaures devient incontrôlable.', 4, 'jurassic.jpg', 3),
	(4, 'Alien', 1979, 116, 'L’équipage d’un vaisseau affronte une créature mortelle.', 5, 'alien.jpg', 4),
	(5, 'Avatar', 2009, 162, 'Un soldat rejoint un peuple extraterrestre menacé.', 4, 'avatar.jpg', 3),
	(6, 'Oppenheimer', 2023, 180, 'La vie de J. Robert Oppenheimer, le physicien dirigeant le projet Manhattan et la création de la première bombe atomique.', 5, 'oppenheimer.jpg', 1),
	(7, 'The Matrix', 1999, 136, 'Un hacker découvre la vérité sur sa réalité.', 5, 'matrix.jpg', 4),
	(8, 'The Batman', 2022, 176, 'Batman enquête sur un tueur énigmatique.', 4, 'batman.jpg', 5),
	(9, 'Star Wars VIII', 2017, 152, 'La Résistance lutte pour survivre face au Premier Ordre.', 3, 'sw8.jpg', 3),
	(10, 'Creed', 2015, 133, 'Le fils d’Apollo Creed cherche à devenir boxeur.', 4, 'creed.jpg', 6);

-- Listage de la structure de table cinema. film_acteur_role
CREATE TABLE IF NOT EXISTS `film_acteur_role` (
  `id_film` int DEFAULT NULL,
  `id_acteur` int DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `FK_film_acteur_role_acteur` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `FK_film_acteur_role_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_film_acteur_role_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.film_acteur_role : ~12 rows (environ)
INSERT INTO `film_acteur_role` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 1),
	(2, 10, 2),
	(3, 8, 3),
	(4, 6, 6),
	(5, 5, 5),
	(6, 10, 10),
	(7, 4, 4),
	(8, 7, 7),
	(9, 2, 2),
	(10, 9, 9),
	(5, 10, 6),
	(9, 2, 1);

-- Listage de la structure de table cinema. film_genre
CREATE TABLE IF NOT EXISTS `film_genre` (
  `id_film` int DEFAULT NULL,
  `id_genre` int DEFAULT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `FK_film_genre_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_film_genre_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.film_genre : ~14 rows (environ)
INSERT INTO `film_genre` (`id_film`, `id_genre`) VALUES
	(1, 4),
	(1, 3),
	(2, 4),
	(3, 2),
	(3, 6),
	(4, 5),
	(5, 4),
	(6, 6),
	(7, 4),
	(7, 5),
	(8, 1),
	(9, 2),
	(10, 6),
	(6, 4);

-- Listage de la structure de table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nomGenre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.genre : ~6 rows (environ)
INSERT INTO `genre` (`id_genre`, `nomGenre`) VALUES
	(1, 'action'),
	(2, 'aventure'),
	(3, 'comédie'),
	(4, 'science-fiction'),
	(5, 'horreur'),
	(6, 'drame');

-- Listage de la structure de table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL DEFAULT '0',
  `prenom` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.realisateur : ~6 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `nom`, `prenom`) VALUES
	(1, 'Nolan', 'Christopher'),
	(2, 'Villeneuve', 'Denis'),
	(3, 'Spielberg', 'Steven'),
	(4, 'Scott', 'Ridley'),
	(5, 'Cameron', 'James'),
	(6, 'Tarantino', 'Quentin');

-- Listage de la structure de table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nomPersonnage` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.role : ~10 rows (environ)
INSERT INTO `role` (`id_role`, `nomPersonnage`) VALUES
	(1, 'Cobb'),
	(2, 'K'),
	(3, 'Ellie'),
	(4, 'John Wick'),
	(5, 'Natasha'),
	(6, 'Max'),
	(7, 'Bruce Wayne'),
	(8, 'Rita'),
	(9, 'Adonis Creed'),
	(10, 'Oppenheimer');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
