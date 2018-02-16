CREATE TABLE IF NOT EXISTS `departement`
(
  `departement_id`  VARCHAR(3) NOT NULL,
  `departement_nom` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`departement_id`)
);

INSERT INTO `departement` (`departement_id`, `departement_nom`) VALUES
  ('1', 'Ain'),
  ('2', 'Aisne'),
  ('3', 'Allier'),
  ('5', 'Hautes-Alpes'),
  ('4', 'Alpes-de-Haute-Provence'),
  ('6', 'Alpes-Maritimes'),
  ('7', 'Ardèche'),
  ('8', 'Ardennes'),
  ('9', 'Ariège'),
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
  ('97', 'Outre mer'),
  ('976', 'Mayotte'),
  ('971', 'Guadeloupe'),
  ('973', 'Guyane'),
  ('972', 'Martinique'),
  ('974', 'Réunion');


CREATE TABLE IF NOT EXISTS `code_postal` (
  `code_postal_id`             VARCHAR(5) NOT NULL,
  `code_postal_code`           VARCHAR(5) NOT NULL,
  `code_postal_commune`        VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL,
  `code_postal_departement_id` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`code_postal_id`),
  CONSTRAINT `fk_Dpt`
  FOREIGN KEY (`code_postal_departement_id`)
  REFERENCES `pomme`.`departement` (`departement_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

INSERT INTO `code_postal` (`code_postal_id`, `code_postal_code`, `code_postal_commune`, `code_postal_departement_id`)
VALUES
  (37000, '98000', 'commune imaginaire', '1');


CREATE TABLE IF NOT EXISTS `pomme`.`users` (
  `user_id`             INT           NOT NULL AUTO_INCREMENT,
  `user_login`          VARCHAR(25)   NOT NULL UNIQUE,
  `user_mdp`            VARCHAR(30)   NOT NULL,
  `user_type`           INT(1)        NOT NULL,
  `user_nom`            VARCHAR(45)   NOT NULL,
  `user_prenom`         VARCHAR(45)   NULL,
  `user_tel`            INT(10)       NULL,
  `user_mail`           VARCHAR(100)  NULL,
  `user_adresse`        VARCHAR(100)  NULL,
  `user_code_postal_id` VARCHAR(5)    NOT NULL,
  `user_titre`          VARCHAR(60)   NULL,
  `user_description`    VARCHAR(5000) NULL,
  `user_photo`          VARCHAR(100)  NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_Cp`
  FOREIGN KEY (`user_code_postal_id`)
  REFERENCES `pomme`.`code_postal` (`code_postal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

INSERT INTO `users` (`user_id`, `user_login`, `user_mdp`, `user_type`, `user_nom`, `user_prenom`, `user_tel`, `user_mail`, `user_adresse`, `user_code_postal_id`, `user_titre`, `user_description`)
VALUES ('1', 'login', 'mdp', '1', 'dupond', 'jean', '0659436732', 'jeandupond@hotmail.fr', '45 rue des oiseaux', 37000,
             'vente de vin', 'vin de bordeaux 7euros la bouteille'),
  ('2', 'fab', 'fab', '0', 'fabrice', 'imbert', '324532', NULL, NULL, '37000', 'producteur', NULL),
  ('3', 'cla', 'cla', '1', 'clarisse', 'sauvage', '23432432', NULL, NULL, '37000', 'programmeuse', NULL);

CREATE TABLE IF NOT EXISTS `pomme`.`categorie` (
  `categorie_id`   INT         NOT NULL AUTO_INCREMENT,
  `categorie_nom`  VARCHAR(45) NOT NULL,
  `categorie_pere` INT         NULL,
  PRIMARY KEY (`categorie_id`),
  CONSTRAINT `fk_categorie`
  FOREIGN KEY (`categorie_pere`)
  REFERENCES `pomme`.`categorie` (`categorie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES ('1', 'Fruit', NULL);
INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES ('2', 'pomme', '1');
INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES ('3', 'Vin', NULL);
INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES ('4', 'vin de Bordeaux', '3');
INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_pere`) VALUES ('5', 'Clémentine', '1');


CREATE TABLE IF NOT EXISTS `pomme`.`produit` (
  `produit_id`           INT           NOT NULL AUTO_INCREMENT,
  `produit_user_id`      INT(11)       NOT NULL,
  `produit_nom`          VARCHAR(150)  NOT NULL,
  `produit_description`  VARCHAR(5000) NULL,
  `produit_photo`        VARCHAR(100)  NULL,
  `produit_prix`         DECIMAL(5, 3) NOT NULL,
  `produit_stock`        INT           NOT NULL,
  `produit_unite`        VARCHAR(50)   NOT NULL,
  `produit_valeur_unite` DECIMAL(5, 2) NOT NULL,
  `produit_categorie_id` INT           NOT NULL,
  PRIMARY KEY (`produit_id`),
  INDEX `fk_Produit_1_idx` (`produit_user_id` ASC),
  CONSTRAINT `fk_Produit_1` FOREIGN KEY (`produit_user_id`) REFERENCES `pomme`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Produit_5` FOREIGN KEY (`produit_categorie_id`)
  REFERENCES `pomme`.`categorie` (`categorie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

INSERT INTO `produit` (`produit_id`, `produit_user_id`, `produit_nom`, `produit_description`, `produit_photo`, `produit_prix`, `produit_stock`, `produit_unite`, `produit_valeur_unite`, `produit_categorie_id`)
VALUES ('1', '1', 'vin', 'super vin rouge de qualité', NULL, '7', '80', 'bouteille', '1', '4');

CREATE TABLE IF NOT EXISTS commande (
  commande_id             INT(11)      NOT NULL AUTO_INCREMENT,
  commande_statut         VARCHAR(55)  NOT NULL,
  commande_date_livraison DATE         NOT NULL,
  commande_lieu           VARCHAR(255)          DEFAULT NULL,
  commande_description    VARCHAR(500) NOT NULL,
  commande_producteur     INT(11)      NOT NULL,
  commande_contenance     INT(2)       NOT NULL,
  commande_client         INT(11)      NOT NULL,
  PRIMARY KEY (commande_id),
  CONSTRAINT `fk_commande_producteur`
  FOREIGN KEY (`commande_producteur`)
  REFERENCES `pomme`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_commande_users_client`
  FOREIGN KEY (`commande_client`)
  REFERENCES `pomme`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

INSERT INTO `pomme`.`commande` (`commande_id`, `commande_statut`, `commande_date_livraison`, `commande_lieu`, `commande_description`, `commande_producteur`, `commande_contenance`, `commande_client`)
VALUES (NULL, 'En cours', '2018-01-23', 'a talence', 'entre 2h et 3h', '1', '3', '1');

CREATE TABLE IF NOT EXISTS ligne (
  ligne_id          INT(11) NOT NULL AUTO_INCREMENT,
  ligne_user_id     INT(11) NOT NULL,
  ligne_produit_id  INT(11) NOT NULL,
  ligne_nom_produit VARCHAR(77),
  ligne_prix        DECIMAL(5, 2),
  ligne_quantite    INT(2)  NOT NULL,
  ligne_commande_id INT(11) NOT NULL,
  PRIMARY KEY (ligne_id),
  CONSTRAINT `fk_ligne_commande_id`
  FOREIGN KEY (`ligne_commande_id`)
  REFERENCES `pomme`.`commande` (`commande_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ligne_users_client_id`
  FOREIGN KEY (`ligne_user_id`)
  REFERENCES `pomme`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ligne_produit_id`
  FOREIGN KEY (`ligne_produit_id`)
  REFERENCES `pomme`.`produit` (`produit_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

INSERT INTO `pomme`.`ligne` (`ligne_id`, `ligne_user_id`, `ligne_produit_id`, `ligne_quantite`, `ligne_commande_id`)
VALUES (NULL, '1', '1', '1', '1');

DROP TABLE IF EXISTS `ligne_view`;

CREATE VIEW `ligne_commande_view`  AS
  SELECT
    `ligne`.`ligne_id`               AS `ligne_id`,
    `ligne`.`ligne_quantite`,
    `ligne`.`ligne_produit_id`,
    `ligne`.`ligne_commande_id`,
    `ligne`.`ligne_user_id`,
    `produit`.`produit_id`,
    `produit`.`produit_nom`,
    `produit`.`produit_prix`,
    `commande`.`commande_id`,
    `commande`.`commande_statut`     AS `statut_de_commande`,
    `commande`.`commande_date_livraison`,
    `commande`.`commande_statut`,
    `commande`.`commande_lieu`,
    `commande`.`commande_producteur` AS `commande_producteur_id`,
    `commande`.`commande_client`     AS `commande_livreur_id`,
    `user_producteur`.`user_id`      AS `producteur_id`,
    `user_producteur`.`user_nom`     AS `producteur_nom`,
    `user_producteur`.`user_prenom`  AS `producteur_prenom`,
    `user_producteur`.`user_tel`     AS `producteur_tel`,
    `user_producteur`.`user_mail`    AS `producteur_mail`,
    `user_livreur`.`user_id`         AS `livreur_id`,
    `user_livreur`.`user_nom`        AS `livreur_nom`,
    `user_livreur`.`user_prenom`     AS `livreur_prenom`,
    `user_livreur`.`user_tel`        AS `livreur_tel`,
    `user_livreur`.`user_mail`       AS `livreur_mail`
  FROM (`ligne`
    JOIN `produit`
    JOIN `commande`
    JOIN `users` AS `user_producteur`
    JOIN `users` AS `user_livreur`)
  WHERE (`produit`.`produit_id` = `ligne`.`ligne_produit_id`
         AND `commande`.`commande_id` = `ligne`.`ligne_commande_id`
         AND `user_livreur`.`user_id` = `commande`.`commande_client`
         AND `user_producteur`.`user_id` = `commande`.`commande_producteur`);

-- Table des favoris qui permet d'associer 2 user_id pour permetre de lier un client  un producteur favoris

CREATE TABLE IF NOT EXISTS `favoris` (
  `favoris_id`         INT(11) NOT NULL AUTO_INCREMENT,
  `favoris_client`     INT(11) NOT NULL,
  `favoris_producteur` INT(11) NOT NULL,
  PRIMARY KEY (`favoris_id`),
  CONSTRAINT `fk_favoris_client`
  FOREIGN KEY (`favoris_client`)
  REFERENCES `pomme`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_favoris_producteur`
  FOREIGN KEY (`favoris_producteur`)
  REFERENCES `pomme`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);

INSERT INTO `pomme`.`favoris` (`favoris_id`, `favoris_client`, `favoris_producteur`) VALUES (NULL, '2', '1');

CREATE VIEW `favoris_view` AS
  SELECT
    `f`.`favoris_producteur`  AS `favoris_producteur`,
    `u`.`user_nom`            AS `user_nom`,
    `u`.`user_prenom`         AS `user_prenom`,
    `u`.`user_titre`          AS `user_titre`,
    `c`.`code_postal_commune` AS `code_postal_commune`,
    `f`.`favoris_client`      AS `favoris_client`
  FROM ((`favoris` `f`
    JOIN `users` `u`) JOIN `code_postal` `c`)
  WHERE ((`u`.`user_id` = `f`.`favoris_producteur`) AND (`c`.`code_postal_id` = `u`.`user_code_postal_id`));



