-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2018 at 08:38 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pomme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--
-- Creation: Jan 30, 2018 at 08:34 AM
-- Last update: Jan 30, 2018 at 08:34 AM
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `categorie_id`   INT(11)                      NOT NULL,
  `categorie_nom`  VARCHAR(45) COLLATE utf8_bin NOT NULL,
  `categorie_pere` INT(11) DEFAULT NULL
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES
  (1, 'Fruit', NULL),
  (2, 'Pomme', 1),
  (3, 'Vin', NULL),
  (4, 'vin de Bordeaux', 3),
  (5, 'Clémentine', 1),
  (33, 'Tomates', 1);

-- --------------------------------------------------------

--
-- Table structure for table `code_postal`
--
-- Creation: Jan 30, 2018 at 08:35 AM
-- Last update: Jan 30, 2018 at 08:35 AM
-- Last check: Jan 30, 2018 at 08:35 AM
--

DROP TABLE IF EXISTS `code_postal`;
CREATE TABLE `code_postal` (
  `code_postal_id`             VARCHAR(11) COLLATE utf8_bin NOT NULL,
  `code_postal_code`           VARCHAR(5) COLLATE utf8_bin  NOT NULL,
  `code_postal_commune`        VARCHAR(50) COLLATE utf8_bin NOT NULL,
  `code_postal_departement_id` VARCHAR(3) COLLATE utf8_bin  NOT NULL
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--
-- Creation: Jan 30, 2018 at 08:35 AM
-- Last update: Jan 30, 2018 at 08:35 AM
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `commande_id`             INT(11)                       NOT NULL,
  `commande_statut`         VARCHAR(55) COLLATE utf8_bin  NOT NULL,
  `commande_date_livraison` DATE                          NOT NULL,
  `commande_lieu`           VARCHAR(255) COLLATE utf8_bin DEFAULT NULL,
  `commande_description`    VARCHAR(500) COLLATE utf8_bin NOT NULL,
  `commande_producteur`     INT(11)                       NOT NULL,
  `commande_contenance`     INT(2)                        NOT NULL,
  `commande_client`         INT(11)                       NOT NULL
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`commande_id`, `commande_statut`, `commande_date_livraison`, `commande_lieu`, `commande_description`, `commande_producteur`, `commande_contenance`, `commande_client`)
VALUES
  (1, 'En cours', '2018-01-23', 'a talence', 'entre 2h et 3h', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--
-- Creation: Jan 30, 2018 at 08:36 AM
-- Last update: Jan 30, 2018 at 08:36 AM
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE `departement` (
  `departement_id`  VARCHAR(3) COLLATE utf8_bin NOT NULL,
  `departement_nom` VARCHAR(255) COLLATE utf8_bin DEFAULT NULL
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`departement_id`, `departement_nom`) VALUES
  ('01', 'Ain'),
  ('02', 'Aisne'),
  ('03', 'Allier'),
  ('05', 'Hautes-Alpes'),
  ('04', 'Alpes-de-Haute-Provence'),
  ('06', 'Alpes-Maritimes'),
  ('07', 'Ardèche'),
  ('08', 'Ardennes'),
  ('09', 'Ariège'),
  ('10', 'Aube'),
  ('11', 'Aude'),
  ('12', 'Aveyron'),
  ('13', 'Bouches-du-Rhône'),
  ('14', 'Calvados'),
  ('15', 'Cantal'),
  ('16', 'Charente'),
  ('17', 'Charente-Maritime'),
  ('18', 'Cher'),
  ('19', 'Corrèze'),
  ('2a', 'Corse-du-sud'),
  ('2b', 'Haute-corse'),
  ('21', 'Côte-d\'or'),
  ('22', 'Côtes-d\'armor'),
  ('23', 'Creuse'),
  ('24', 'Dordogne'),
  ('25', 'Doubs'),
  ('26', 'Drôme'),
  ('27', 'Eure'),
  ('28', 'Eure-et-Loir'),
  ('29', 'Finistère'),
  ('30', 'Gard'),
  ('31', 'Haute-Garonne'),
  ('32', 'Gers'),
  ('33', 'Gironde'),
  ('34', 'Hérault'),
  ('35', 'Ile-et-Vilaine'),
  ('36', 'Indre'),
  ('37', 'Indre-et-Loire'),
  ('38', 'Isère'),
  ('39', 'Jura'),
  ('40', 'Landes'),
  ('41', 'Loir-et-Cher'),
  ('42', 'Loire'),
  ('43', 'Haute-Loire'),
  ('44', 'Loire-Atlantique'),
  ('45', 'Loiret'),
  ('46', 'Lot'),
  ('47', 'Lot-et-Garonne'),
  ('48', 'Lozère'),
  ('49', 'Maine-et-Loire'),
  ('50', 'Manche'),
  ('51', 'Marne'),
  ('52', 'Haute-Marne'),
  ('53', 'Mayenne'),
  ('54', 'Meurthe-et-Moselle'),
  ('55', 'Meuse'),
  ('56', 'Morbihan'),
  ('57', 'Moselle'),
  ('58', 'Nièvre'),
  ('59', 'Nord'),
  ('60', 'Oise'),
  ('61', 'Orne'),
  ('62', 'Pas-de-Calais'),
  ('63', 'Puy-de-Dôme'),
  ('64', 'Pyrénées-Atlantiques'),
  ('65', 'Hautes-Pyrénées'),
  ('66', 'Pyrénées-Orientales'),
  ('67', 'Bas-Rhin'),
  ('68', 'Haut-Rhin'),
  ('69', 'Rhône'),
  ('70', 'Haute-Saône'),
  ('71', 'Saône-et-Loire'),
  ('72', 'Sarthe'),
  ('73', 'Savoie'),
  ('74', 'Haute-Savoie'),
  ('75', 'Paris'),
  ('76', 'Seine-Maritime'),
  ('77', 'Seine-et-Marne'),
  ('78', 'Yvelines'),
  ('79', 'Deux-Sèvres'),
  ('80', 'Somme'),
  ('81', 'Tarn'),
  ('82', 'Tarn-et-Garonne'),
  ('83', 'Var'),
  ('84', 'Vaucluse'),
  ('85', 'Vendée'),
  ('86', 'Vienne'),
  ('87', 'Haute-Vienne'),
  ('88', 'Vosges'),
  ('89', 'Yonne'),
  ('90', 'Territoire de Belfort'),
  ('91', 'Essonne'),
  ('92', 'Hauts-de-Seine'),
  ('93', 'Seine-Saint-Denis'),
  ('94', 'Val-de-Marne'),
  ('95', 'Val-d\'oise'),
  ('976', 'Mayotte'),
  ('971', 'Guadeloupe'),
  ('973', 'Guyane'),
  ('972', 'Martinique'),
  ('974', 'Réunion');

-- --------------------------------------------------------

--
-- Table structure for table `ligne`
--
-- Creation: Jan 30, 2018 at 08:36 AM
-- Last update: Jan 30, 2018 at 08:36 AM
--

DROP TABLE IF EXISTS `ligne`;
CREATE TABLE `ligne` (
  `ligne_id`          INT(11) NOT NULL,
  `ligne_user_id`     INT(11) NOT NULL,
  `ligne_produit_id`  INT(11) NOT NULL,
  `ligne_quantite`    INT(5)  NOT NULL,
  `ligne_commande_id` INT(11) NOT NULL
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `ligne`
--

INSERT INTO `ligne` (`ligne_id`, `ligne_user_id`, `ligne_produit_id`, `ligne_quantite`, `ligne_commande_id`) VALUES
  (1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--
-- Creation: Jan 30, 2018 at 08:37 AM
-- Last update: Jan 30, 2018 at 08:37 AM
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `produit_id`           INT(11)                       NOT NULL,
  `produit_user_id`      INT(11)                       NOT NULL,
  `produit_nom`          VARCHAR(150) COLLATE utf8_bin NOT NULL,
  `produit_description`  VARCHAR(5000) COLLATE utf8_bin DEFAULT NULL,
  `produit_photo`        VARCHAR(100) COLLATE utf8_bin  DEFAULT NULL,
  `produit_prix`         DECIMAL(5, 2)                 NOT NULL,
  `produit_stock`        INT(11)                       NOT NULL,
  `produit_unite`        VARCHAR(50) COLLATE utf8_bin  NOT NULL,
  `produit_valeur_unite` DECIMAL(5, 2)                 NOT NULL,
  `produit_categorie_id` INT(11)                       NOT NULL
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`produit_id`, `produit_user_id`, `produit_nom`, `produit_description`, `produit_photo`, `produit_prix`, `produit_stock`, `produit_unite`, `produit_valeur_unite`, `produit_categorie_id`)
VALUES
  (1, 2, 'Bob', 'Blabla', 'ijgr', '5.00', 1, 'kg', '2.00', 56),
  (2, 2, 'efzzf', 'fezfez', 'hdb', '5.00', 8, 'kg', '6.00', 5),
  (3, 2, 'fzeze', 'fefze', 'hdb', '5.00', 8, 'kg', '6.00', 5),
  (41, 23, 'Poulet mignon', 'Mais courageux !', 'poulet.jpg', '5.00', 5, '5', '5.00', 5),
  (38, 23, 'Sandwich thon', 'Bon sandwich à la mayo', 'sand.jpg', '3.00', 10, 'sandwich', '1.00', 4),
  (47, 25, 'Chemise sans boutons', 'Une révolution dans la mode', 'chem.jpg', '50.00', 4, 'chemise', '1.00', 0),
  (22, 23, 'Salade bleue', 'Belle salade bien verte et bleue', 'salade.gif', '1.00', 30, 'pièce', '1.00', 3),
  (21, 23, 'Truite Saumon', 'Deux bébés à adopter', 'truitenofake.png', '50.00', 2, 'bébé', '1.00', 5),
  (20, 23, 'Pommes d\'api', 'Jolies pommes roses', 'pommeap.jpg', '1.00', 120, 'kg', '1.00', 2),
  (19, 23, 'Tomates cerises', 'Jolies petites tomates rouges', 'tomate.jpg', '6.00', 10, 'kg', '1.00', 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Jan 30, 2018 at 08:37 AM
-- Last update: Jan 30, 2018 at 08:37 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id`             INT(11)                      NOT NULL,
  `user_login`          VARCHAR(25) COLLATE utf8_bin NOT NULL,
  `user_mdp`            VARCHAR(30) COLLATE utf8_bin NOT NULL,
  `user_type`           INT(1)                       NOT NULL,
  `user_nom`            VARCHAR(45) COLLATE utf8_bin NOT NULL,
  `user_prenom`         VARCHAR(45) COLLATE utf8_bin   DEFAULT NULL,
  `user_tel`            INT(10)                        DEFAULT NULL,
  `user_mail`           VARCHAR(100) COLLATE utf8_bin  DEFAULT NULL,
  `user_adresse`        VARCHAR(100) COLLATE utf8_bin  DEFAULT NULL,
  `user_code_postal_id` VARCHAR(11) COLLATE utf8_bin   DEFAULT NULL,
  `user_titre`          VARCHAR(60) COLLATE utf8_bin   DEFAULT NULL,
  `user_description`    VARCHAR(5000) COLLATE utf8_bin DEFAULT NULL
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_mdp`, `user_type`, `user_nom`, `user_prenom`, `user_tel`, `user_mail`, `user_adresse`, `user_code_postal_id`, `user_titre`, `user_description`)
VALUES
  (23, 'ac', 'ac', 1, 'Rik', 'Chris', 585957462, 'lefun@gmail.com', '12 rue du pain', '33000', 'La plus belle page',
   'Achetez mes patates !'),
  (25, 'chemise', 'sansboutons', 1, 'Wane', 'Cheikhouna', 785968456, 'chem@gmail.com', '12 rue des chemises', '40000',
       'Les premières chemises sans boutons !', 'En exclusivité !');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`categorie_id`),
  ADD KEY `fk_categorie` (`categorie_pere`);

--
-- Indexes for table `code_postal`
--
ALTER TABLE `code_postal`
  ADD PRIMARY KEY (`code_postal_id`),
  ADD KEY `fk_Dpt` (`code_postal_departement_id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`commande_id`),
  ADD KEY `fk_commande_producteur` (`commande_producteur`),
  ADD KEY `fk_commande_users_client` (`commande_client`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`departement_id`);

--
-- Indexes for table `ligne`
--
ALTER TABLE `ligne`
  ADD PRIMARY KEY (`ligne_id`),
  ADD KEY `fk_ligne_commande_id` (`ligne_commande_id`),
  ADD KEY `fk_ligne_users_client_id` (`ligne_user_id`),
  ADD KEY `fk_ligne_produit_id` (`ligne_produit_id`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`produit_id`),
  ADD KEY `fk_Produit_1_idx` (`produit_user_id`),
  ADD KEY `fk_Produit_5` (`produit_categorie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_login` (`user_login`),
  ADD KEY `fk_Cp` (`user_code_postal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `commande_id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `ligne`
--
ALTER TABLE `ligne`
  MODIFY `ligne_id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `produit_id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
