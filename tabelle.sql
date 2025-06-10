CREATE TABLE `utenti` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`cognome` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`PASSWORD` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=12
;

CREATE TABLE `prodotti_woman` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`prezzo` DECIMAL(10,2) NULL DEFAULT NULL,
	`immagine_orig` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`immagine2_hover` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=7
;

CREATE TABLE `prodotti_mens` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`prezzo` DECIMAL(10,2) NULL DEFAULT NULL,
	`immagine_orig` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`immagine2_hover` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`colore` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=19
;

CREATE TABLE `prodotti` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`prezzo` DECIMAL(10,2) NULL DEFAULT NULL,
	`immagine_orig` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`immagine2_hover` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=18
;

CREATE TABLE `carrello` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`id_utente` INT(11) NOT NULL,
	`id_prodotto` INT(11) NOT NULL,
	`quantita` INT(11) NULL DEFAULT '1',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `id_utente` (`id_utente`) USING BTREE,
	INDEX `id_prodotto` (`id_prodotto`) USING BTREE,
	CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti_mens` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=7
;
