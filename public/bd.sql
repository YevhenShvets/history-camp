CREATE TABLE `Tags`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `Tags` ADD PRIMARY KEY `tags_id_primary`(`id`);
CREATE TABLE `Post`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` BLOB NOT NULL,
    `picture` BLOB NULL,
    `date_create` DATETIME NOT NULL,
    `date_update` DATETIME NOT NULL
);
ALTER TABLE
    `Post` ADD PRIMARY KEY `post_id_primary`(`id`);
CREATE TABLE `Post_Tags`(
    `id_post` INT NOT NULL,
    `id_tag` INT NOT NULL
);
CREATE TABLE `Feedback`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `date_create` DATETIME NOT NULL,
    `user_email` VARCHAR(255) NOT NULL,
    `user_phone` VARCHAR(255) NOT NULL,
    `user_name` VARCHAR(255) NOT NULL,
    `user_message` VARCHAR(255) NOT NULL,
    `answered` TINYINT(1) NOT NULL
);
ALTER TABLE
    `Feedback` ADD PRIMARY KEY `feedback_id_primary`(`id`);
CREATE TABLE `Tariffs`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `date_start` DATETIME NOT NULL,
    `date_end` DATETIME NOT NULL,
    `price` INT NOT NULL,
    `description` BLOB NOT NULL,
    `picture` BLOB NULL
);
ALTER TABLE
    `Tariffs` ADD PRIMARY KEY `tariffs_id_primary`(`id`);
CREATE TABLE `ReserveTariff`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_tarif` INT NOT NULL,
    `user_name` VARCHAR(255) NOT NULL,
    `user_phone` VARCHAR(255) NOT NULL,
    `user_email` VARCHAR(255) NOT NULL,
    `user_comment` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `ReserveTariff` ADD PRIMARY KEY `reservetariff_id_primary`(`id`);
ALTER TABLE
    `Post_Tags` ADD CONSTRAINT `post_tags_id_tag_foreign` FOREIGN KEY(`id_tag`) REFERENCES `Tags`(`id`);
ALTER TABLE
    `Post_Tags` ADD CONSTRAINT `post_tags_id_post_foreign` FOREIGN KEY(`id_post`) REFERENCES `Post`(`id`);
ALTER TABLE
    `ReserveTariff` ADD CONSTRAINT `reservetariff_id_tarif_foreign` FOREIGN KEY(`id_tarif`) REFERENCES `Tariffs`(`id`);