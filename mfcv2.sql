-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 avr. 2020 à 14:46
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mfcv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `dmd_inscription`
--

CREATE TABLE `dmd_inscription` (
  `insc_id` int(11) NOT NULL,
  `insc_statut` varchar(30) NOT NULL,
  `insc_date` varchar(30) NOT NULL,
  `session_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `form_id` int(11) NOT NULL,
  `form_nom` varchar(50) NOT NULL,
  `form_cat` enum('brx','rsx','dev') NOT NULL,
  `form_desc` longtext NOT NULL,
  `form_niveau` enum('Débutant','Intermédiaire','Avancée','Expert') NOT NULL,
  `form_nbplace` int(11) NOT NULL,
  `form_prix` int(11) NOT NULL,
  `form_duree` int(11) NOT NULL,
  `form_lieu` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`form_id`, `form_nom`, `form_cat`, `form_desc`, `form_niveau`, `form_nbplace`, `form_prix`, `form_duree`, `form_lieu`) VALUES
(1, 'Excel VBA', 'brx', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus quam imperdiet massa viverra consectetur a ut odio. Nullam eleifend turpis non faucibus egestas. Vivamus consequat libero eros, sed gravida leo finibus in. Suspendisse interdum finibus dui, sed viverra diam convallis vel. Integer porttitor fermentum lorem a tincidunt. Nullam ut dolor metus. Quisque eros tortor, tempor eleifend pretium ut, interdum vel eros. Praesent feugiat ante eget metus gravida venenatis. Morbi suscipit neque at felis consectetur euismod. Phasellus id tellus arcu. Vestibulum ac tristique ex. Cras et diam convallis, semper eros eget, finibus mauris. Nam rutrum justo eget ultrices feugiat. Fusce a mollis arcu, vitae dictum eros. Mauris et dolor lorem.\r\n\r\nNullam ultricies commodo velit vitae fermentum. Aliquam sit amet feugiat neque. Vestibulum non efficitur eros. Vivamus vitae nulla venenatis libero vehicula euismod. Etiam enim dui, porttitor sit amet sem in, gravida tincidunt turpis. Curabitur ut lacinia eros. Morbi pharetra dolor velit, at eleifend eros gravida sit amet. Curabitur euismod, eros vel blandit hendrerit, enim ex volutpat est, sed pretium eros neque id mauris.', 'Intermédiaire', 30, 2500, 2, 'Villemoisson'),
(2, 'Pack office : les bases ', 'brx', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus quam imperdiet massa viverra consectetur a ut odio. Nullam eleifend turpis non faucibus egestas. Vivamus consequat libero eros, sed gravida leo finibus in. Suspendisse interdum finibus dui, sed viverra diam convallis vel. Integer porttitor fermentum lorem a tincidunt. Nullam ut dolor metus. Quisque eros tortor, tempor eleifend pretium ut, interdum vel eros. Praesent feugiat ante eget metus gravida venenatis. Morbi suscipit neque at felis consectetur euismod. Phasellus id tellus arcu. Vestibulum ac tristique ex. Cras et diam convallis, semper eros eget, finibus mauris. Nam rutrum justo eget ultrices feugiat. Fusce a mollis arcu, vitae dictum eros. Mauris et dolor lorem.\r\n\r\nNullam ultricies commodo velit vitae fermentum. Aliquam sit amet feugiat neque. Vestibulum non efficitur eros. Vivamus vitae nulla venenatis libero vehicula euismod. Etiam enim dui, porttitor sit amet sem in, gravida tincidunt turpis. Curabitur ut lacinia eros. Morbi pharetra dolor velit, at eleifend eros gravida sit amet. Curabitur euismod, eros vel blandit hendrerit, enim ex volutpat est, sed pretium eros neque id mauris.', 'Débutant', 30, 1400, 2, 'Villemoisson ');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `session_date` date NOT NULL,
  `session_place` int(50) NOT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`session_id`, `session_date`, `session_place`, `form_id`) VALUES
(1, '2020-04-14', 30, 1),
(2, '2020-04-15', 27, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_nom` varchar(30) NOT NULL,
  `usr_prenom` varchar(30) NOT NULL,
  `usr_email` varchar(30) NOT NULL,
  `usr_telephone` varchar(30) NOT NULL,
  `usr_passe` varchar(30) NOT NULL,
  `usr_desc` longtext NOT NULL,
  `usr_dateinsc` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`usr_id`, `usr_nom`, `usr_prenom`, `usr_email`, `usr_telephone`, `usr_passe`, `usr_desc`, `usr_dateinsc`) VALUES
(1, 'Jean', 'Marc', 'test@test.fr', '0606060600', 'test', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dmd_inscription`
--
ALTER TABLE `dmd_inscription`
  ADD PRIMARY KEY (`insc_id`),
  ADD KEY `dmd_inscription_session_FK` (`session_id`),
  ADD KEY `dmd_inscription_users0_FK` (`usr_id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`form_id`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `session_formation_FK` (`form_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dmd_inscription`
--
ALTER TABLE `dmd_inscription`
  MODIFY `insc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dmd_inscription`
--
ALTER TABLE `dmd_inscription`
  ADD CONSTRAINT `dmd_inscription_session_FK` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`),
  ADD CONSTRAINT `dmd_inscription_users0_FK` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_formation_FK` FOREIGN KEY (`form_id`) REFERENCES `formation` (`form_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
