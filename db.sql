-- -----------------------------------------------------
-- Table `respuestas_preguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `respuestas_preguntas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_pregunta` INT NOT NULL,
  `detalle` TEXT NOT NULL,
  `correcta` TINYINT NOT NULL,
  `deleted` TINYINT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `preguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_trivia` INT NOT NULL,
  `id_tipo` INT NOT NULL,
  `id_nivel` INT NOT NULL,
  `titulo` VARCHAR(500) NOT NULL,
  `detalle` TEXT NULL,
  `deleted` TINYINT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ranking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ranking` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_trivia` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  `puntaja_total` INT NULL,
  `posicion` INT NULL,
  `deleted` TINYINT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trivias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trivias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(500) NOT NULL,
  `detalle` TEXT NULL,
  `deleted` TINYINT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `preguntas_tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `preguntas_tipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(200) NOT NULL,
  `deleted` TINYINT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updted_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `respuestas_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `respuestas_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `id_pregunta` INT NOT NULL,
  `id_respuesta` INT NULL,
  `texto_respuesta` TEXT NULL,
  `deleted` TINYINT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `niveles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `deleted` TINYINT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

insert into niveles values 
(1, 'Facil', NULL, NOW(), NULL, 1),
(2, 'Medio', NULL, NOW(), NULL, 1),
(3, 'Dificil', NULL, NOW(), NULL,1);

insert into preguntas_tipos values 
(1, 'Opción múltiple', NULL, NOW(), NULL, 1),
(2, 'Verdadero/Falso', NULL, NOW(), NULL, 1),
(3, 'Respuesta corta', NULL, NOW(), NULL,1);


CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `alias` VARCHAR(255) NULL,
  `deleted` TINYINT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;