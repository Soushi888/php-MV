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

INSERT INTO products (name, price, description)
VALUES ("pizza", 25, "pizza with cheese"),
       ("burger", 15, "burger with cheese"),
       ("cola", 5, "cola with ice"),
       ("fries", 10, "fries with ketchup");

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

INSERT INTO reviews (product_id, title, name, rating, content)
VALUES (1, 'Great product', 'John', 5, 'I love this product'),
       (1, 'Great product', 'Jane', 4,
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam asperiores beatae cumque dolor dolore doloremque et fugit id, ipsum laborum molestias nam, non officia, optio quis quisquam recusandae sit.'),
       (1, 'Great product', 'Soushi', 5, 'I love this product'),
       (1, 'Great product', 'Sacha', 2,
        'Dolor dolore doloremque et fugit id, ipsum laborum molestias nam, non officia, optio quis quisquam recusandae sit.'),
       (1, 'Great product', 'Nicolas', 3.5, 'I love this product'),
       (2, 'Nice !!', 'Sacha', 5, 'Thank you !');