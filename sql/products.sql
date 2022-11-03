# Create and populate the products table with test data

DROP TABLE IF EXISTS products;

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

INSERT INTO products (name, price, description)
VALUES ("pizza", 25, "pizza with cheese"),
       ("burger", 15, "burger with cheese"),
       ("cola", 5, "cola with ice"),
       ("fries", 10, "fries with ketchup");