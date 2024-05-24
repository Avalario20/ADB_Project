-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 mai 2024 à 19:41
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `adb`
--

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int NOT NULL AUTO_INCREMENT,
  `titre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_message` text NOT NULL,
  `username_auteur` varchar(255) NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`id_sujet`, `titre`, `description`, `message`, `date_message`, `username_auteur`, `id_user`) VALUES
(27, 'Meilleur setup pour le streaming de jeux vidéo ?', 'Je souhaite me lancer dans le streaming de jeux vidéo et je cherche à configurer mon setup. J&#039;ai un budget moyen et je voudrais des conseils sur le matériel essentiel à acheter.', 'Quel setup recommanderiez-vous pour commencer le streaming de jeux vidéo ? Quels équipements sont essentiels et quels logiciels sont les plus performants ?', '23-05-24 18:45:57', 'admin', 7),
(28, 'Comment optimiser les performances de mon PC gaming ?', 'Mon PC commence à montrer des signes de ralentissement lorsque je joue à des jeux récents. Je cherche des astuces pour améliorer ses performances sans tout changer.', 'Quelles sont les meilleures façons d&#039;optimiser les performances d&#039;un PC gaming ? Y a-t-il des réglages ou des composants spécifiques à prioriser ?', '23-05-24 18:46:23', 'admin', 7),
(29, 'Les jeux indépendants à ne pas manquer en 2024 ?', 'J&#039;adore découvrir des jeux indépendants innovants et captivants. Avec la nouvelle année qui commence, je suis à la recherche des titres les plus prometteurs.', 'Quels jeux indépendants recommanderiez-vous de jouer en 2024 ? Quels sont ceux qui ont attiré votre attention et pourquoi ?', '23-05-24 18:46:47', 'admin', 7),
(30, 'Le meilleur jeux vidéo selon vous ?', 'Quelle est votre jeux vidéo préféré', 'Je me demandais quel était votre jeux préféré ? Pour moi c&#039;est sans doute The Last Of Us !', '24-05-24 15:37:38', 'Luano', 10);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `admin`) VALUES
(7, 'admin', 'luano@skynet.be', '$2y$10$OsnQXL43MggE0zJfhhz6LulCmlG99fEBY3JDWmjsYy1qJ3hD27Pa2', 1),
(9, 'Léa', 'degli.esposti.lea@gmail.com', '$2y$10$eRSMNlTqc5Q.uj0NzovLkujmSKLfX4oZ8a8ZkGI6ajViLRyluzVoa', 0),
(10, 'Luano', 'luano@skynet.be', '$2y$10$QBxEFf9ZdvfVze8yFSiCce31aBKjLUeKhujb21yWYAgzCzz2VMrW2', 0),
(11, 'Ilona', 'ilona@skynet.be', '$2y$10$edvzHxnHOgS43W.facFmPeqY8aimRuf3sM2FvSzZRzDKsHcPbHtje', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
