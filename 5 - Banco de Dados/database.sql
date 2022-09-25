-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema delivery
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `delivery` ;

-- -----------------------------------------------------
-- Schema delivery
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `delivery` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `delivery` ;

-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `usuario` (
  `PK_usuario` INT NOT NULL AUTO_INCREMENT,
  `is_adm_usuario` VARCHAR(1) BINARY NULL,
  `nome_usuario` VARCHAR(45) NULL,
  `sobrenome_usuario` VARCHAR(45) NULL,
  `email_usuario` VARCHAR(45) NULL,
  `senha_usuario` VARCHAR(45) NULL,
  `celular_usuario` VARCHAR(45) NULL,
  PRIMARY KEY (`PK_usuario`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `item` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `item` (
  `PK_item` INT NOT NULL AUTO_INCREMENT,
  `nome_item` VARCHAR(45) NULL,
  `descricao_item` VARCHAR(255) NULL,
  `tamanho_item` VARCHAR(45) NULL,
  `preco_item` DECIMAL(2) NULL,
  `imagem_item` BLOB NULL,
  PRIMARY KEY (`PK_item`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `cartao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cartao` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `cartao` (
  `PK_cartao` INT NOT NULL AUTO_INCREMENT,
  `nome_cartao` VARCHAR(45) NULL,
  `numero_cartao` VARCHAR(16) NULL,
  `titular_cartao` VARCHAR(45) NULL,
  `data_validade_cartao` DATETIME NULL,
  `cvv_cartao` INT NULL,
  `fk_usuario` INT NOT NULL,
  PRIMARY KEY (`PK_cartao`),
  INDEX `fk_usuario` (`fk_usuario`),
  CONSTRAINT `fk_usuario_cartao`
    FOREIGN KEY (`fk_usuario`)
    REFERENCES `usuario` (`PK_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `endereco` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `endereco` (
  `PK_endereco` INT NOT NULL AUTO_INCREMENT,
  `rua_endereco` VARCHAR(45) NULL,
  `numero_endereco` VARCHAR(45) NULL,
  `cep_endereco` VARCHAR(45) NULL,
  `bairro_endereco` VARCHAR(45) NULL,
  `complemento_endereco` VARCHAR(45) NULL,
  `fk_usuario` INT NOT NULL,
  PRIMARY KEY (`PK_endereco`),
  INDEX `fk_usuario` (`fk_usuario`),
  CONSTRAINT `fk_usuario_endereco`
    FOREIGN KEY (`fk_usuario`)
    REFERENCES `usuario` (`PK_usuario`)
)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `estado` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `estado` (
  `PK_estado` INT NOT NULL AUTO_INCREMENT,
  `nome_estado` VARCHAR(45) NULL,
  PRIMARY KEY (`PK_estado`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedido` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `pedido` (
  `PK_pedido` INT NOT NULL AUTO_INCREMENT,
  `FK_usuario` INT NOT NULL,
  `fk_estado` INT NOT NULL,
  PRIMARY KEY (`PK_pedido`),
  INDEX `fk_usuario` (`FK_usuario`),
  INDEX `fk_estado` (`fk_estado`),
  CONSTRAINT `fk_usuario_pedido`
    FOREIGN KEY (`FK_usuario`)
    REFERENCES `usuario` (`PK_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estado`
    FOREIGN KEY (`fk_estado`)
    REFERENCES `estado` (`PK_estado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pedido_item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedido_item` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `pedido_item` (
  `PK_pedido_item` INT NOT NULL AUTO_INCREMENT,
  `quantidade_item` INT NULL,
  `observacao_item` VARCHAR(255) NULL,
  `FK_pedido` INT NOT NULL,
  `FK_item` INT NOT NULL,
  PRIMARY KEY (`PK_pedido_item`),
  INDEX `fk_pedido` (`FK_pedido`),
  INDEX `fk_item` (`FK_item`),
  CONSTRAINT `fk_pedido`
    FOREIGN KEY (`FK_pedido`)
    REFERENCES `pedido` (`PK_pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item`
    FOREIGN KEY (`FK_item`)
    REFERENCES `item` (`PK_item`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
