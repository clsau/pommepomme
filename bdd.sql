
CREATE TABLE IF NOT EXISTS `departement` 
(
  `departement_id` int(11) NOT NULL AUTO_INCREMENT,
  `departement_code` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`departement_id`),
  KEY `departement_code` (`departement_code`));
  
  	DROP TABLE IF EXISTS `code_postal`;
CREATE TABLE IF NOT EXISTS `code_postal` (
  `id_CP` varchar(7) NOT NULL,
  `CP` int(5) NOT NULL,
  `Nom_commune` varchar(25) NOT NULL,
  `id_dpt` int(2) NOT NULL,
  CONSTRAINT `fk_Dpt`
    FOREIGN KEY (`id_dpt`)
    REFERENCES `Pomme`.`departement` (`departement_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

   CREATE TABLE `Pomme`.`user` ( 
   `id_user` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `mdp` varchar(10) NOT NULL,
  `type` int(1) NOT NULL,
  `Nom` VARCHAR(45) NOT NULL,
  `Prenom` VARCHAR(45) NULL,
  `Tel` INT NULL,
  `Mail` VARCHAR(45) NULL,
  `Adresse1` VARCHAR(45) NULL,
  `Adresse2` VARCHAR(45) NULL,
  `Adresse3` VARCHAR(45) NULL,
  `Id_CP` INT NULL,
  `Titre` VARCHAR(45) NULL,
  `Description` VARCHAR(450) NULL,
  PRIMARY KEY (`idProducteur`)
  CONSTRAINT `fk_Cp`
    FOREIGN KEY (`Id_CP`)
    REFERENCES `Pomme`.`code_postal` (`id_CP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
	
  ;
  
  CREATE TABLE `Pomme`.`Categorie` (
  `idCategorie` INT NOT NULL,
  `NomCategorie` VARCHAR(45) NOT NULL,
  `PereCategorie` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategorie`)
   CONSTRAINT `fk_Produit_6``
    FOREIGN KEY (`PereCategorie`)
    REFERENCES `Pomme`.`Categorie` (`idCategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
  );
  
 

  
  CREATE TABLE `Pomme`.`Produit` (
  `idProduit` INT NOT NULL,
  `idProducteur` INT NOT NULL,
  `NomProduit` VARCHAR(15) NOT NULL,
  `DescriptionProduit` VARCHAR(45) NULL,
  `PhotoProduit` VARCHAR(100) NULL,
  `PrixProduit` DECIMAL(5,2) NOT NULL,
  `StockProduit` INT NOT NULL,
  `UniteProduit` VARCHAR(10) NOT NULL,
  `Valeur_UniteProduit` DECIMAL(5,2) NOT NULL,
  `IdCategorieProduit` INT NOT NULL,
  PRIMARY KEY (`idProduit`),
  INDEX `fk_Produit_1_idx` (`idProducteur` ASC),
  CONSTRAINT `fk_Produit_1`
    FOREIGN KEY (`idProducteur`)
    REFERENCES `Pomme`.`Producteur` (`idProducteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
		 CONSTRAINT `fk_Produit_5``
    FOREIGN KEY (`IdCategorieProduit`)
    REFERENCES `Pomme`.`Categorie` (`idCategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


