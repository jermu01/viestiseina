-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema messagedb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema messagedb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `messagedb` DEFAULT CHARACTER SET utf8 ;
USE `messagedb` ;

-- -----------------------------------------------------
-- Table `messagedb`.`admin_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `messagedb`.`admin_user` (
  `id` INT(11) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `messagedb`.`published_message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `messagedb`.`published_message` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `text` VARCHAR(255) NOT NULL,
  `file` VARCHAR(255) NOT NULL,
  `created_at` DATE NOT NULL,
  `admin_user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_published_message_admin_user1_idx` (`admin_user_id` ASC) VISIBLE,
  CONSTRAINT `fk_published_message_admin_user1`
    FOREIGN KEY (`admin_user_id`)
    REFERENCES `messagedb`.`admin_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `messagedb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `messagedb`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `messagedb`.`request_message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `messagedb`.`request_message` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `text` VARCHAR(255) NOT NULL,
  `file` VARCHAR(255) NOT NULL,
  `created_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `user_id` INT(11) NOT NULL,
  `admin_user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_message_user_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_request_message_admin_user1_idx` (`admin_user_id` ASC) VISIBLE,
  CONSTRAINT `fk_message_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `messagedb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_request_message_admin_user1`
    FOREIGN KEY (`admin_user_id`)
    REFERENCES `messagedb`.`admin_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 148
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
