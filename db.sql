-- -----------------------------------------------------
-- Table `trivias_preguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trivias_preguntas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_trivia` INT NOT NULL,
  `id_pregunta` INT NOT NULL,
  `puntaje` INT NULL,
  `obligatoria` TINYINT NOT NULL,
  `deleted` TINYINT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `respuestas_preguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `respuestas_preguntas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_pregunta` INT NOT NULL,
  `detalle` TEXT NOT NULL,
  `correcta` TINYINT NOT NULL,
  `deleted` TINYINT NOT NULL DEFAULT 0,
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
  `id_tipo` INT NOT NULL,
  `titulo` VARCHAR(500) NOT NULL,
  `detalle` TEXT NULL,
  `deleted` TINYINT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ranking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ranking` (
  `id` INT NOT NULL,
  `id_trivia` INT NOT NULL,
  `id_user` INT NOT NULL,
  `puntaja_total` INT NULL,
  `posicion` INT NULL,
  `deleted` TINYINT NOT NULL DEFAULT 0,
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
  `deleted` TINYINT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `preguntas_tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `preguntas_tipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(200) NOT NULL,
  `deleted` TINYINT NOT NULL DEFAULT 0,
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
  `id_user` INT NOT NULL,
  `id_pregunta` INT NOT NULL,
  `id_respuesta` INT NULL,
  `texto_respuesta` TEXT NULL,
  `deleted` TINYINT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;