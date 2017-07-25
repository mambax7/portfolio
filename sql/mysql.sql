CREATE TABLE `portfolio_categos` (
  `id_cat` INT(11)      NOT NULL AUTO_INCREMENT,
  `parent` INT(11)      NOT NULL DEFAULT '0',
  `nombre` VARCHAR(150) NOT NULL DEFAULT '',
  `desc`   TEXT         NOT NULL,
  `orden`  INT(11)      NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cat`)
)
  ENGINE = MyISAM;

CREATE TABLE `portfolio_images` (
  `id_img`  INT(11)      NOT NULL AUTO_INCREMENT,
  `archivo` VARCHAR(200) NOT NULL DEFAULT '',
  `work`    INT(11)      NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_img`)
)
  ENGINE = MyISAM;

CREATE TABLE `portfolio_works` (
  `id_w`       INT(11)      NOT NULL AUTO_INCREMENT,
  `titulo`     VARCHAR(200) NOT NULL DEFAULT '',
  `short`      VARCHAR(255) NOT NULL DEFAULT '',
  `desc`       TEXT         NOT NULL,
  `catego`     INT(11)      NOT NULL DEFAULT '0',
  `cliente`    VARCHAR(255) NOT NULL DEFAULT '',
  `comentario` TEXT         NOT NULL,
  `url`        VARCHAR(255) NOT NULL DEFAULT '',
  `resaltado`  TINYINT(1)   NOT NULL DEFAULT '0',
  `imagen`     VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_w`)
)
  ENGINE = MyISAM;
