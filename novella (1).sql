-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 mars 2021 à 15:01
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `novella`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `ID_achat` int(10) NOT NULL,
  `ID_categorie_achat` int(10) DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `date_achat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`ID_achat`, `ID_categorie_achat`, `quantite`, `prix`, `date_achat`) VALUES
(7, 3, 10, 2500, '2020-08-26'),
(8, 2, 5, 2000, '2020-08-28'),
(9, 1, 3, 10000, '2020-08-26'),
(10, 1, 10, 2000, '2021-02-18'),
(11, 2, 20, 3500, '2021-02-18'),
(12, 3, 5, 150, '2021-02-18');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `ID` int(11) NOT NULL,
  `IDCAT` int(11) DEFAULT NULL,
  `ARTICLE` varchar(12) DEFAULT NULL,
  `PRIX_ACHAT` int(10) DEFAULT NULL,
  `PRIX_VENTE` int(10) DEFAULT NULL,
  `NB_CASIER` int(10) NOT NULL,
  `SEUIL` varchar(10) DEFAULT NULL,
  `DESCRIPTION` varchar(20) DEFAULT NULL,
  `DATECREAT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID`, `IDCAT`, `ARTICLE`, `PRIX_ACHAT`, `PRIX_VENTE`, `NB_CASIER`, `SEUIL`, `DESCRIPTION`, `DATECREAT`) VALUES
(2, 2, 'Amstel', 19600, 2000, 12, '6', 'depot relais me doit', '2021-02-22'),
(3, 3, 'akeza mutima', 1500, 1500, 6, '2', 'sans alcool', '2021-02-22'),
(4, 4, 'ozagara', 12000, 1200, 12, '5', 'boisson local', '2021-02-22'),
(7, 2, 'Royale', 34500, 2000, 20, '20', '', '2021-02-24'),
(9, 2, 'Bechu', 25400, 1500, 20, '10', 'ffff', '2021-02-26'),
(10, 2, 'Primus', 16500, 1500, 20, '12', 'gros primus', '2021-02-26'),
(11, 1, 'drosdy', 40000, 8000, 6, '2', 'test', '2021-03-01'),
(12, 2, 'Baju', 18600, 1100, 20, '15', 'ttt', '2021-03-02'),
(13, 1, 'vin de messe', 60000, 20000, 4, '5', 'h', '2021-03-02'),
(14, 3, 'kinju', 16000, 800, 24, '10', 'jj', '2021-03-03');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `IDCAT` int(10) NOT NULL,
  `LIBELLE` varchar(15) DEFAULT NULL,
  `DATECREAT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`IDCAT`, `LIBELLE`, `DATECREAT`) VALUES
(1, 'VIN', '2021-02-19'),
(2, 'BRARUDI', '2021-02-22'),
(3, 'B NON ALCOOLISE', '2021-02-22'),
(4, 'B ALCOOLISEE', '2021-02-22');

-- --------------------------------------------------------

--
-- Structure de la table `categorieproduction`
--

CREATE TABLE `categorieproduction` (
  `ID_categorieP` int(10) NOT NULL,
  `nom_categorie` varchar(20) DEFAULT NULL,
  `motif` varchar(30) DEFAULT NULL,
  `prix` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorieproduction`
--

INSERT INTO `categorieproduction` (`ID_categorieP`, `nom_categorie`, `motif`, `prix`) VALUES
(1, 'produit200', 'cream 200 fbu', 200),
(2, 'produit300', 'cream 300 fbu', 300),
(5, 'forme', 'mise en forme barafe', 100),
(6, 'viva', 'sss', 75),
(7, 'sa', 'sasa', 789);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_achat`
--

CREATE TABLE `categorie_achat` (
  `ID_categorie_achat` int(10) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_achat`
--

INSERT INTO `categorie_achat` (`ID_categorie_achat`, `nom`, `description`) VALUES
(1, 'chocolat', 'ambelir'),
(2, 'colorant', 'colorant'),
(3, 'sucre', 'ambelir'),
(4, 'kinju', 's');

-- --------------------------------------------------------

--
-- Structure de la table `control`
--

CREATE TABLE `control` (
  `ID_control` int(12) NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `quantite_rencontre` float DEFAULT NULL,
  `date_control` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `control_article`
--

CREATE TABLE `control_article` (
  `id_controle_article` int(11) NOT NULL,
  `ID_control` int(12) DEFAULT NULL,
  `ID` int(11) DEFAULT NULL,
  `quantite_rencontre` float DEFAULT NULL,
  `quantite_initiale` float DEFAULT NULL,
  `quantite_vendue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `historique_production`
--

CREATE TABLE `historique_production` (
  `ID_historique` int(10) NOT NULL,
  `ID_categorieP` int(10) DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `quantite_produite` float DEFAULT NULL,
  `date_production` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique_production`
--

INSERT INTO `historique_production` (`ID_historique`, `ID_categorieP`, `heure_debut`, `heure_fin`, `quantite_produite`, `date_production`) VALUES
(1, 1, '12:01:00', '12:21:00', 12, '2020-08-28'),
(2, 1, '16:56:00', '20:01:00', 11, '2020-08-08'),
(3, 1, '21:35:00', '23:38:00', 150, '2021-02-18'),
(4, 2, '21:36:00', '21:37:00', 75, '2021-02-19'),
(5, 1, '21:37:00', '21:40:00', 4, '2021-02-19'),
(6, 1, '22:40:00', '23:41:00', 2, '2021-02-18'),
(7, 1, '21:50:00', '23:52:00', 2, '2021-02-18'),
(8, 5, '01:00:00', '02:50:00', 50, '2021-02-19');

-- --------------------------------------------------------

--
-- Structure de la table `histor_stock`
--

CREATE TABLE `histor_stock` (
  `ID_histo` int(12) NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL,
  `date_stock` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `permission_page`
--

CREATE TABLE `permission_page` (
  `ID_permission` int(10) NOT NULL,
  `ID_profil` int(10) DEFAULT NULL,
  `page` varchar(30) DEFAULT NULL,
  `L` int(1) DEFAULT NULL,
  `C` int(1) DEFAULT NULL,
  `M` int(1) DEFAULT NULL,
  `S` int(1) DEFAULT NULL,
  `page_accept` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `permission_page`
--

INSERT INTO `permission_page` (`ID_permission`, `ID_profil`, `page`, `L`, `C`, `M`, `S`, `page_accept`) VALUES
(1, 1, 'achat', 1, 1, 1, 1, 1),
(2, 1, 'achatdujour', 1, 1, 1, 1, 1),
(3, 1, 'achat_mensuel', 1, 1, 1, 1, 1),
(4, 1, 'production', 1, 1, 1, 1, 1),
(5, 1, 'vente', 1, 1, 1, 1, 1),
(6, 1, 'ventejour', 1, 1, 1, 1, 1),
(7, 1, 'rapport', 1, 1, 1, 1, 1),
(8, 1, 'dette_agent', 1, 1, 1, 1, 1),
(9, 1, 'ventemensuelle', 1, 1, 1, 1, 1),
(10, 1, 'vendeur', 1, 1, 1, 1, 1),
(11, 1, 'utilisateur', 1, 1, 1, 1, 1),
(12, 1, 'production_journaliere', 1, 1, 1, 1, 1),
(13, 1, 'Changer_motpasse', 1, 1, 1, 1, 1),
(14, 1, 'setprofiluser', 1, 1, 1, 1, 1),
(15, 1, 'dashboard', 1, 1, 1, 1, 1),
(16, 1, 'voir_profil', 1, 1, 1, 1, 1),
(17, 1, 'voir_utilisateur', 1, 1, 1, 1, 1),
(33, 16, 'achat', 1, 1, 0, 0, 1),
(34, 16, 'vente', 1, 1, 0, 0, 1),
(35, 16, 'production', 0, 0, 0, 0, 0),
(36, 16, 'vendeur', 0, 0, 0, 0, 0),
(37, 16, 'utilisateur', 0, 0, 0, 0, 0),
(38, 16, 'setprofiluser', 0, 0, 0, 0, 0),
(39, 16, 'dashboard', 0, 0, 0, 0, 0),
(40, 16, 'voir_profil', 0, 0, 0, 0, 0),
(41, 16, 'voir_utilisateur', 0, 0, 0, 0, 0),
(42, 1, 'stock', 1, 1, 1, 1, 1),
(43, 1, 'dashstock', 1, 0, 1, 1, 1),
(44, 1, 'article', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `production`
--

CREATE TABLE `production` (
  `ID_production` int(10) NOT NULL,
  `ID_categorieP` int(10) DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `quantite_produite` float DEFAULT NULL,
  `date_production` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `production`
--

INSERT INTO `production` (`ID_production`, `ID_categorieP`, `heure_debut`, `heure_fin`, `quantite_produite`, `date_production`) VALUES
(10, 1, '16:22:00', '18:22:00', 392, '2020-08-26'),
(11, 2, '16:22:00', '20:23:00', 200, '2020-08-26'),
(37, 5, '01:00:00', '02:50:00', 30, '2021-02-19');

-- --------------------------------------------------------

--
-- Structure de la table `profil_utilisateur`
--

CREATE TABLE `profil_utilisateur` (
  `ID_profil` int(10) NOT NULL,
  `nom_profil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil_utilisateur`
--

INSERT INTO `profil_utilisateur` (`ID_profil`, `nom_profil`) VALUES
(16, 'gerant'),
(1, 'responsable');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `ID_stock` int(11) NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL,
  `date_stock` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_at` time DEFAULT NULL,
  `end_at` time DEFAULT NULL,
  `heureTotal` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tests`
--

INSERT INTO `tests` (`id`, `name`, `start_at`, `end_at`, `heureTotal`) VALUES
(3, 'Test 1', '08:00:00', '10:00:00', 20000);

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

CREATE TABLE `unite` (
  `ID` int(10) NOT NULL,
  `UNITE` varchar(10) DEFAULT NULL,
  `DESCRIPTION` varchar(10) DEFAULT NULL,
  `DATECREAT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `unite`
--

INSERT INTO `unite` (`ID`, `UNITE`, `DESCRIPTION`, `DATECREAT`) VALUES
(1, 'kg', 'masse', '2021-02-22'),
(2, 'litre', 'pour le ', '2021-02-22');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_utilisateur` int(10) NOT NULL,
  `ID_profil` int(10) DEFAULT NULL,
  `nom_utilisateur` varchar(10) DEFAULT NULL,
  `prenom` varchar(10) DEFAULT NULL,
  `login` varchar(10) DEFAULT NULL,
  `mot_de_passe` varchar(10) DEFAULT NULL,
  `date_creation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_utilisateur`, `ID_profil`, `nom_utilisateur`, `prenom`, `login`, `mot_de_passe`, `date_creation`) VALUES
(1, 1, 'bukasa', 'gabi', 'gabriel', 'bukasa123', '2020-08-30'),
(3, 16, 'gerant', 'gerant', 'gerant', 'gerant', '2020-08-31'),
(4, 1, 'admin', 'admin', 'admin', 'admin', '2021-02-22');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `ID_vendeur` int(10) NOT NULL,
  `nomVendeur` varchar(15) DEFAULT NULL,
  `prenom` varchar(10) DEFAULT NULL,
  `adresse` varchar(15) DEFAULT NULL,
  `telephone` int(10) DEFAULT NULL,
  `age` varchar(5) DEFAULT NULL,
  `date_vendeur` date DEFAULT NULL,
  `salaire` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID_vendeur`, `nomVendeur`, `prenom`, `adresse`, `telephone`, `age`, `date_vendeur`, `salaire`) VALUES
(4, 'Siriak', 'dieu-donné', 'kamenge', 6002522, '25', '2020-08-13', 300),
(5, 'evariste', 'kiko', 'jabe', 6002522, '25', '2020-08-13', 250),
(6, 'smoka', 'bosy', 'genda', 123666, '30', '2020-08-13', 100),
(7, 'zuba', 'ermes', 'mugoboka', 123666, '30', '2020-08-13', 450),
(8, 'appolinaire', 'normand', 'nyakabiga', 123666, '30', '2020-08-13', 500);

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `ID_vente` int(10) NOT NULL,
  `ID_categorieP` int(10) NOT NULL,
  `ID_vendeur` int(10) DEFAULT NULL,
  `quantite_totale` int(10) DEFAULT NULL,
  `quantite_vendue` int(10) DEFAULT NULL,
  `quantite_retour` int(10) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `manquant` float NOT NULL,
  `date_vente` date DEFAULT NULL,
  `frais_divers` float DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `dette` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`ID_vente`, `ID_categorieP`, `ID_vendeur`, `quantite_totale`, `quantite_vendue`, `quantite_retour`, `montant`, `manquant`, `date_vente`, `frais_divers`, `note`, `dette`) VALUES
(19, 2, 4, 30, 29, 1, 8700, 5, '2021-02-22', 0, 'recyclage', 0),
(20, 2, 6, 12, 12, 0, 3000, 300, '2020-08-28', 300, 'deg', 0),
(22, 1, 8, 10, 10, 0, 2000, 0, '2020-03-26', 0, 'c', 0),
(23, 1, 7, 50, 40, 10, 6000, 4000, '2020-08-26', 0, 'manquant', 0),
(24, 1, 4, 50, 40, 10, 6000, 2500, '2020-08-26', 1500, 'regard', 0),
(25, 1, 8, 50, 10, 40, 1200, 700, '2021-02-22', 100, 'test avant', 0),
(26, 1, 6, 12, 10, 2, 2000, 0, '2021-02-22', 0, 'vente de smoka', 0),
(27, 1, 4, 15, 15, 0, 3000, 0, '2020-08-28', 0, 'mmmmmm', 0),
(28, 1, 5, 20, 15, 5, 2000, 500, '2020-08-28', 500, 'nnnnnn', 0),
(29, 2, 7, 40, 40, 0, 8000, 4000, '2020-08-28', 0, 'nn', 0),
(30, 1, 4, 10, 10, 0, 2000, 0, '2021-02-22', 0, 'qwertyuio', 0),
(31, 1, 6, 10, 10, 0, 2000, 0, '2021-02-22', 0, 'l est pris en charge par tout le monde (même mobile), sauf IE8 et les versions antérieures', 0),
(32, 1, 6, 10, 9, 1, 1800, 0, '2021-02-22', 0, 'bagora', 0),
(33, 2, 5, 12, 12, 0, 2400, 1200, '2020-08-28', 0, 'der', 0),
(34, 2, 8, 10, 2, 8, 400, 200, '2021-02-22', 0, 'ml', 0),
(35, 2, 5, 10, 10, 0, 2000, 1000, '2020-08-29', 0, 'm', 0),
(36, 1, 4, 10, 10, 0, 2000, 0, '2020-04-17', 0, 'm', 0),
(37, 1, 8, 15, 12, 3, 2400, 0, '2020-08-28', 0, 'ddddd', 0),
(38, 5, 8, 20, 20, 0, 1800, 200, '2021-02-22', 0, 'test', 0),
(39, 1, 4, 10, 10, 0, 1800, 200, '2021-02-22', 0, 'd', 200),
(40, 1, 7, 2, 2, 0, 400, -1, '2021-02-22', 1, 'axx vv', 200);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`ID_achat`),
  ADD KEY `fk_categorie_achat` (`ID_categorie_achat`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_stock_boisson` (`IDCAT`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`IDCAT`);

--
-- Index pour la table `categorieproduction`
--
ALTER TABLE `categorieproduction`
  ADD PRIMARY KEY (`ID_categorieP`);

--
-- Index pour la table `categorie_achat`
--
ALTER TABLE `categorie_achat`
  ADD PRIMARY KEY (`ID_categorie_achat`);

--
-- Index pour la table `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`ID_control`),
  ADD KEY `fk_article_control` (`ID`);

--
-- Index pour la table `control_article`
--
ALTER TABLE `control_article`
  ADD PRIMARY KEY (`id_controle_article`);

--
-- Index pour la table `historique_production`
--
ALTER TABLE `historique_production`
  ADD PRIMARY KEY (`ID_historique`);

--
-- Index pour la table `histor_stock`
--
ALTER TABLE `histor_stock`
  ADD PRIMARY KEY (`ID_histo`);

--
-- Index pour la table `permission_page`
--
ALTER TABLE `permission_page`
  ADD PRIMARY KEY (`ID_permission`),
  ADD KEY `fk_permission_page` (`ID_profil`);

--
-- Index pour la table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`ID_production`),
  ADD UNIQUE KEY `ID_categorieP` (`ID_categorieP`);

--
-- Index pour la table `profil_utilisateur`
--
ALTER TABLE `profil_utilisateur`
  ADD PRIMARY KEY (`ID_profil`),
  ADD UNIQUE KEY `nom_profil` (`nom_profil`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ID_stock`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `unite`
--
ALTER TABLE `unite`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_utilisateur`),
  ADD KEY `fk_user_profil` (`ID_profil`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`ID_vendeur`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`ID_vente`),
  ADD KEY `fk_vente_on_IDcategorieP` (`ID_categorieP`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `ID_achat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `IDCAT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categorieproduction`
--
ALTER TABLE `categorieproduction`
  MODIFY `ID_categorieP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categorie_achat`
--
ALTER TABLE `categorie_achat`
  MODIFY `ID_categorie_achat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `control`
--
ALTER TABLE `control`
  MODIFY `ID_control` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `control_article`
--
ALTER TABLE `control_article`
  MODIFY `id_controle_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `historique_production`
--
ALTER TABLE `historique_production`
  MODIFY `ID_historique` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `histor_stock`
--
ALTER TABLE `histor_stock`
  MODIFY `ID_histo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `permission_page`
--
ALTER TABLE `permission_page`
  MODIFY `ID_permission` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `production`
--
ALTER TABLE `production`
  MODIFY `ID_production` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `profil_utilisateur`
--
ALTER TABLE `profil_utilisateur`
  MODIFY `ID_profil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `ID_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `unite`
--
ALTER TABLE `unite`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_utilisateur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `ID_vendeur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `ID_vente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `fk_categorie_achat` FOREIGN KEY (`ID_categorie_achat`) REFERENCES `categorie_achat` (`ID_categorie_achat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_stock_boisson` FOREIGN KEY (`IDCAT`) REFERENCES `categorie` (`IDCAT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `fk_article_control` FOREIGN KEY (`ID`) REFERENCES `article` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `permission_page`
--
ALTER TABLE `permission_page`
  ADD CONSTRAINT `fk_permission_page` FOREIGN KEY (`ID_profil`) REFERENCES `profil_utilisateur` (`ID_profil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `fk_categorie_production` FOREIGN KEY (`ID_categorieP`) REFERENCES `categorieproduction` (`ID_categorieP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_article_stock` FOREIGN KEY (`ID`) REFERENCES `article` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_user_profil` FOREIGN KEY (`ID_profil`) REFERENCES `profil_utilisateur` (`ID_profil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `fk_vente_on_IDcategorieP` FOREIGN KEY (`ID_categorieP`) REFERENCES `categorieproduction` (`ID_categorieP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
