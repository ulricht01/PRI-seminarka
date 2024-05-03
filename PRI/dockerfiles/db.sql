
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `pri` DEFAULT CHARACTER SET utf8 ;
USE `pri` ;

CREATE TABLE IF NOT EXISTS `pri`.`recepcni` (
  `id_recepcni` INT NOT NULL AUTO_INCREMENT,
  `jmeno` VARCHAR(25) NOT NULL,
  `prijmeni` VARCHAR(25) NOT NULL,
  `heslo` VARCHAR(25) NOT NULL,
  `uz_jmeno` VARCHAR(21) NOT NULL,
  PRIMARY KEY (`id_recepcni`),
  UNIQUE INDEX `uz_jmeno_UNIQUE` (`uz_jmeno` ASC) VISIBLE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `pri`.`pokoje` (
  `id_pokoje` INT NOT NULL AUTO_INCREMENT,
  `patro` INT NOT NULL,
  `cislo_pokoje` INT NOT NULL,
  `obsazeno` VARCHAR(1) NOT NULL DEFAULT 'N',
  `uklizeno` VARCHAR(1) NOT NULL DEFAULT 'Y',
  `luzka` INT NOT NULL,
  PRIMARY KEY (`id_pokoje`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `pri`.`rezervace` (
  `id_rezervace` INT NOT NULL AUTO_INCREMENT,
  `jmeno_zakaznika` VARCHAR(45) NOT NULL,
  `prijmeni_zakaznika` VARCHAR(45) NOT NULL,
  `datum_prijezdu` DATE NOT NULL,
  `datum_odjezdu` DATE NOT NULL,
  `id_recepcni` INT NOT NULL,
  `id_pokoje` INT NOT NULL,
  PRIMARY KEY (`id_rezervace`, `id_recepcni`, `id_pokoje`),
  INDEX `fk_rezervace_recepcni_idx` (`id_recepcni` ASC) VISIBLE,
  INDEX `fk_rezervace_pokoje1_idx` (`id_pokoje` ASC) VISIBLE,
  CONSTRAINT `fk_rezervace_recepcni`
    FOREIGN KEY (`id_recepcni`)
    REFERENCES `pri`.`recepcni` (`id_recepcni`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rezervace_pokoje1`
    FOREIGN KEY (`id_pokoje`)
    REFERENCES `pri`.`pokoje` (`id_pokoje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
