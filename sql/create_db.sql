CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

# Create and populate the products table with test data
SET foreign_key_checks = 0;
DROP TABLE IF EXISTS products;
SET foreign_key_checks = 1;

CREATE TABLE products
(
    id          INT AUTO_INCREMENT
        PRIMARY KEY,
    name        VARCHAR(255)   NOT NULL,
    price       DECIMAL(10, 2) NOT NULL,
    description TEXT           NULL,
    created_at  DATETIME       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME       NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) engine = InnoDB;

# Create and populate the reviews table with test data
DROP TABLE IF EXISTS reviews;

CREATE TABLE reviews
(
    id         INT AUTO_INCREMENT
        PRIMARY KEY,
    product_id INT          NOT NULL,
    title      VARCHAR(255) NOT NULL,
    name       VARCHAR(255) NOT NULL,
    rating     FLOAT        NOT NULL,
    content    TEXT         NOT NULL,
    CONSTRAINT product_id_fk
        FOREIGN KEY (product_id) REFERENCES products (id)
            ON DELETE CASCADE
) engine = InnoDB;