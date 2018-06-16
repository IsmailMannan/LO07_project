-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 16 juin 2018 à 11:39
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

CREATE TABLE `disponibilite` (
  `idPlanning` int(11) NOT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `idNounou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE `enfant` (
  `idEnfant` int(11) NOT NULL,
  `idParent` int(11) DEFAULT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `restriction_alimentaire` varchar(45) DEFAULT NULL,
  `information_general` varchar(255) DEFAULT NULL,
  `email_parent` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `idEvaluation` int(11) NOT NULL,
  `idParent` int(11) DEFAULT NULL,
  `idNounou` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `appreciation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `utilisateur_id` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL,
  `langue` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `idPrestation` int(11) NOT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `idNounou` int(11) DEFAULT NULL,
  `idEnfant` int(11) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mdp` int(45) NOT NULL,
  `portable` varchar(45) DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `experience` varchar(45) DEFAULT NULL,
  `phrase_presentation` varchar(255) DEFAULT NULL,
  `type_user` int(11) DEFAULT NULL,
  `categorie` int(10) NOT NULL,
  `login` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `adresse`, `email`, `mdp`, `portable`, `photo`, `age`, `experience`, `phrase_presentation`, `type_user`, `categorie`, `login`) VALUES
(1, 'Mannan', 'Ismail', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'smileallday@hotmail.fr'),
(2, 'michel', 'michel', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'michmich'),
(3, 'michel', 'michel', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'michmich'),
(4, 'michel', 'michel', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'michmich'),
(5, 'michel', 'michel', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'michmich'),
(6, 'michel', 'michel', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'michmich'),
(7, 'michel', 'Machin', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'truc'),
(8, 'michel', 'Machin', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'truc'),
(9, 'michel', 'Machin', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'truc'),
(10, 'michel', 'Machin', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'truc'),
(11, 'michel', 'Machin', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'truc'),
(12, 'michel', 'Machin', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'truc'),
(13, 'aa', 'muche', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'truc'),
(14, NULL, NULL, NULL, 'abc@d.fr', 1234, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(15, 'Mannan', 'Ismail', 'Les Noes pres Troyes', 'smileallday@hotmail.fr', 659499159, 'C:xampp	mpphp886E.tmp', '24', 0, 'bonjour', 'await', 0, 0, ''),
(16, 'Mannan', 'Ismail', 'Les Noes pres Troyes', 'emilie@hotmil.fr', 659499159, 'C:xampp	mpphpB672.tmp', '21', 0, 'az', 'await', 0, 0, ''),
(17, 'Mannan', 'Ismail', 'Les Noes pres Troyes', 'az@fr.de', 0, '0659499159', 'C:xampp	mpphp33E.tmp', 18, 'debutant', 'azzzz', 0, 0, ''),
(18, 'mama', 'foussa', 'Paris', 'parent@gmail.com', 0, '0654893214', 'C:xampp	mpphp779.tmp', NULL, NULL, '        Cours', 0, 0, ''),
(19, 'Martin', 'Jeanne', 'Paris', 'parent@live.fr', 0, '0751369478', 'C:xampp	mpphpD95B.tmp', NULL, NULL, '        sans gluten', 2, 0, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`idPlanning`),
  ADD KEY `id-nounou_idx` (`idNounou`);

--
-- Index pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`idEnfant`),
  ADD KEY `idParent_idx` (`idParent`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`idEvaluation`),
  ADD KEY `id-parent_idx` (`idParent`),
  ADD KEY `id-nounou_idx` (`idNounou`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`idLangue`),
  ADD KEY `fk_utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`idPrestation`),
  ADD KEY `id-nounou_idx` (`idNounou`),
  ADD KEY `id-enfant_idx` (`idEnfant`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  MODIFY `idPlanning` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enfant`
--
ALTER TABLE `enfant`
  MODIFY `idEnfant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `idEvaluation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `idLangue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `idPrestation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD CONSTRAINT `id-nounou_dispo` FOREIGN KEY (`idNounou`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `idParent` FOREIGN KEY (`idParent`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `id-nounou_eval` FOREIGN KEY (`idNounou`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id-parent` FOREIGN KEY (`idParent`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `langue`
--
ALTER TABLE `langue`
  ADD CONSTRAINT `fk_utilisateur_id` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD CONSTRAINT `id-enfant_presta` FOREIGN KEY (`idEnfant`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id-nounou_presta` FOREIGN KEY (`idNounou`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
