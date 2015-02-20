SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`empresa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`empresa` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `databasechb` VARCHAR(45) NULL ,
  `codigochb` VARCHAR(45) NULL ,
  `nome` VARCHAR(45) NULL ,
  `servidor` VARCHAR(45) NULL ,
  `porta` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `empresa_id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `setor` VARCHAR(45) NULL ,
  `ramal` VARCHAR(45) NULL ,
  `login` VARCHAR(45) NULL ,
  `senha` VARCHAR(45) NULL ,
  `nivelacesso` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`, `empresa_id`) ,
  INDEX `fk_usuario_empresa` (`empresa_id` ASC) ,
  CONSTRAINT `fk_usuario_empresa`
    FOREIGN KEY (`empresa_id` )
    REFERENCES `mydb`.`empresa` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
