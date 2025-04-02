-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 02 avr. 2025 à 08:12
-- Version du serveur : 10.8.2-MariaDB
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `watchref`
--

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('film','serie','anime') NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `titre`, `description`, `image`, `type`, `url`) VALUES
(18, 'Attack on Titan', 'Un anime épique où l\'humanité lutte pour sa survie contre des créatures gigantesques appelées Titans. L\'histoire prend une tournure dramatique et remplie de suspense avec des révélations surprenantes.', '../uploads/Attack on Titan.jpg', 'anime', NULL),
(19, 'Avengers Endgame', 'La conclusion de la saga Marvel avec un affrontement ultime contre Thanos. Ce film de super-héros offre une aventure épique et pleine d\'émotion.', '../uploads/Avengers Endgame.webp', 'film', NULL),
(20, 'Black Clover', 'Suivez Asta, un jeune garçon sans pouvoirs magiques, dans sa quête pour devenir le Roi Sorcier. Un anime plein d\'action et de magie.', '../uploads/Black Clover.jpg', 'anime', NULL),
(21, 'Dragon Ball', 'L\'univers de Dragon Ball est une saga légendaire où des héros comme Goku affrontent des ennemis toujours plus puissants dans des combats spectaculaires.', '../uploads/Dragon Ball.jpg', 'anime', NULL),
(22, 'Game of Thrones', 'Une série emblématique de fantasy politique où les familles nobles se battent pour le Trône de Fer dans un monde dangereux et imprévisible.', '../uploads/Game of Thrones.jpg', 'serie', NULL),
(23, 'Hunter x Hunter', 'Suivez Gon Freecss dans sa quête pour devenir Hunter, un métier rare et prestigieux, tout en découvrant des secrets cachés et affrontant des adversaires puissants.', '../uploads/Hunter x Hunter.jpg', 'anime', NULL),
(24, 'Naruto', 'Naruto Uzumaki rêve de devenir le plus grand ninja et d’être reconnu dans son village. Un anime rempli d\'aventures, de combats et de valeurs de persévérance.', '../uploads/Naruto.webp', 'anime', NULL),
(25, 'One Piece', 'Une aventure épique en mer à la recherche du One Piece, le trésor ultime. L\'anime suit Luffy et son équipage dans un voyage inoubliable plein de mystères.', '../uploads/One Piece.webp', 'anime', NULL),
(26, 'One Punch Man', 'Suivez Saitama, un homme devenu si puissant qu\'il peut battre n\'importe quel ennemi d\'un seul coup. Un anime qui mélange action et humour avec un héros invincible.', '../uploads/One Punch Man.png', 'anime', NULL),
(27, 'Parasyte', 'Un manga et anime où des parasites extraterrestres envahissent la Terre et prennent possession du corps des humains. Un combat pour la survie s’engage dans cette série sanglante et captivante.', '../uploads/Parasyte.jpg', 'anime', NULL),
(28, 'Snowfall', 'Cette série suit l\'ascension du trafic de drogue à Los Angeles dans les années 80, mettant en lumière les vies de jeunes impliqués dans la vente de cocaïne.', '../uploads/snowfall.jpg', 'serie', NULL),
(29, 'Tensei Shitara Slime Datta Ken', 'Un homme réincarné dans un monde fantastique sous la forme d\'un slime puissant, dans une aventure où il développe une grande nation et une armée.', '../uploads/Tensei Shitara Slime Datta Ken.jpg', 'anime', NULL),
(30, 'The Eminence in Shadow', 'Un jeune homme ambitieux réincarné dans un monde de fantasy décide de se cacher dans l\'ombre et de manipuler les événements pour devenir un \"maître secret\".', '../uploads/The Eminence in Shadow.png', 'anime', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `media_sites`
--

DROP TABLE IF EXISTS `media_sites`;
CREATE TABLE IF NOT EXISTS `media_sites` (
  `media_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  PRIMARY KEY (`media_id`,`site_id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sites_streaming`
--

DROP TABLE IF EXISTS `sites_streaming`;
CREATE TABLE IF NOT EXISTS `sites_streaming` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_site` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sites_streaming`
--

INSERT INTO `sites_streaming` (`id`, `nom_site`, `description`, `url`, `image`) VALUES
(11, 'Canal+', 'Le site de Canal+ propose une large variété de films, séries, sports en direct, et émissions. Il est reconnu pour ses exclusivités et ses productions originales.', 'https://www.canalplus.com', '../uploads/canal+.webp'),
(12, 'Crunchyroll', 'Crunchyroll est une plateforme de streaming dédiée aux animés. Vous y trouverez des centaines de séries et films d\'animation japonais, avec des sous-titres dans plusieurs langues.', 'https://www.crunchyroll.com', '../uploads/crunchyroll.avif'),
(13, 'Disney+', 'Le service de streaming de Disney propose une bibliothèque massive incluant les films classiques Disney, les franchises Star Wars, Marvel, Pixar, et plus encore.', 'https://www.disneyplus.com', '../uploads/disney+.png'),
(14, 'Netflix', 'Netflix est une plateforme de streaming qui offre une vaste bibliothèque de films, séries et documentaires, avec des productions originales très populaires.', 'https://www.netflix.com', '../uploads/netflix.jpg'),
(15, 'Prime Video', 'Le service de streaming d\'Amazon propose une large gamme de films, séries, et émissions exclusives. Il offre aussi des films primés et une riche bibliothèque de contenu.', 'https://www.primevideo.com', '../uploads/primevideo.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(5, 'Ahamadi', 'Isaïe-Dean, Nawfel', 'ahamadiisaie@gmail.com', '$2y$10$6FGbYa2vahxhzjHWBHbCpul5tygDSVzgFEySJ.WuqjPla1av0jOcC', 'admin'),
(6, 'Patate', 'Show', 'ShowPatate976@gmail.com', '$2y$10$Tw3fbwbqUj3Ovk/6vySrK.8az2TPNQwk2f.lfjheHlVBVecGX3aRu', 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `media_sites`
--
ALTER TABLE `media_sites`
  ADD CONSTRAINT `media_sites_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `medias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `media_sites_ibfk_2` FOREIGN KEY (`site_id`) REFERENCES `sites_streaming` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
