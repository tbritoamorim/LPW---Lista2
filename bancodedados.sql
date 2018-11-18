-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema linguagemprogramacaowebi
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema linguagemprogramacaowebi
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `linguagemprogramacaowebi` DEFAULT CHARACTER SET latin1 ;
USE `linguagemprogramacaowebi` ;

-- -----------------------------------------------------
-- Table `linguagemprogramacaowebi`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `linguagemprogramacaowebi`.`categorias` (
  `id` INT(11) NOT NULL,
  `categoriascol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `linguagemprogramacaowebi`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `linguagemprogramacaowebi`.`produtos` (
  `id` INT(11) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `codigo` VARCHAR(250) NOT NULL,
  `descricao` TEXT NOT NULL,
  `valor_compra` DECIMAL(10,2) NOT NULL,
  `valor_venda` DECIMAL(10,2) NOT NULL,
  `categorias_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `categorias_id` (`categorias_id` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `linguagemprogramacaowebi`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `linguagemprogramacaowebi`.`tb_usuario` (
  `id_usuario` INT(11) NOT NULL,
  `tx_nome` VARCHAR(30) NOT NULL,
  `tx_login` VARCHAR(10) NOT NULL,
  `tx_senha` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
