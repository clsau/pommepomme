CREATE TABLE IF NOT EXISTS `departement`
(
  `departement_id` varchar(3) NOT NULL,
  `departement_nom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`departement_id`));


CREATE TABLE IF NOT EXISTS `code_postal` (
  `code_postal_id` int NOT NULL,
  `code_postal_code` varchar(5) NOT NULL,
  `code_postal_commune` varchar(50) NOT NULL,
  `code_postal_departement_id` varchar(3) NOT NULL,
PRIMARY KEY(`code_postal_id`),
  CONSTRAINT `fk_Dpt`
    FOREIGN KEY (`code_postal_departement_id`)
    REFERENCES `Pomme`.`departement` (`departement_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

  CREATE TABLE IF NOT EXISTS `Pomme`.`users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(25) NOT NULL,
  `user_mdp` varchar(30) NOT NULL,
  `user_type` int(1) NOT NULL,
  `user_nom` VARCHAR(45) NOT NULL,
  `user_prenom` VARCHAR(45) NULL,
  `user_tel` INT(10) NULL,
  `user_mail` VARCHAR(100) NULL,
  `user_adresse` VARCHAR(100) NULL,
  `user_code_postal_id` INT NULL,
  `user_titre` VARCHAR(60) NULL,
  `user_description` VARCHAR(5000) NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_Cp`
    FOREIGN KEY (`user_code_postal_id`)
    REFERENCES `Pomme`.`code_postal` (`code_postal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

  ;

  CREATE TABLE `Pomme`.`categorie` (
  `categorie_id` INT NOT NULL,
  `categorie_nom` VARCHAR(45) NOT NULL,
  `categorie_pere` INT NULL,
  PRIMARY KEY (`categorie_id`),
   CONSTRAINT `fk_categorie`
    FOREIGN KEY (`categorie_pere`)
    REFERENCES `Pomme`.`categorie` (`categorie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
  );



  CREATE TABLE `Pomme`.`produit` (
  `produit_id` INT NOT NULL,
  `produit_user_id` INT(11) NOT NULL,
  `produit_nom` VARCHAR(150) NOT NULL,
  `produit_description` VARCHAR(5000) NULL,
  `produit_photo` VARCHAR(100) NULL,
  `produit_prix` DECIMAL(5,3) NOT NULL,
  `produit_stock` INT NOT NULL,
  `produit_unite` VARCHAR(50) NOT NULL,
  `produit_valeur_unite` DECIMAL(5,2) NOT NULL,
  `produit_categorie_id` INT NOT NULL,
  PRIMARY KEY (`produit_id`),
  INDEX `fk_Produit_1_idx` (`produit_user_id` ASC),
  CONSTRAINT `fk_Produit_1` FOREIGN KEY (`produit_user_id`) REFERENCES `Pomme`.`users` (`user_id`)
  ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Produit_5` FOREIGN KEY (`produit_categorie_id`)
    REFERENCES `Pomme`.`categorie` (`categorie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

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
('21', 'Côte-d''or'),
('22', 'Côtes-d''armor'),
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
('95', 'Val-d''oise'),
('976', 'Mayotte'),
('971', 'Guadeloupe'),
('973', 'Guyane'),
('972', 'Martinique'),
('974', 'Réunion');


INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES ('1', 'Fruit', NULL);
INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES ('2', 'Pomme', '1');
INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES ('3', 'Vin', NULL);
INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES ('4', 'vin de Bordeaux', '3');
INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES ('5', 'Clémentine', '1');
