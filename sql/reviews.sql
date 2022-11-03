# Create and populate the review table with test data

DROP TABLE IF EXISTS reviews;

CREATE TABLE reviews
(
    id         INT AUTO_INCREMENT
        PRIMARY KEY,
    product_id INT          NOT NULL,
    title      VARCHAR(255) NOT NULL,
    name       VARCHAR(255) NOT NULL,
    content    TEXT         NOT NULL
) engine = InnoDB;

INSERT INTO reviews (product_id, title, name, content)
VALUES (1, 'Great product', 'John', 'I love this product'),
       (1, 'Great product', 'Jane',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam asperiores beatae cumque dolor dolore doloremque et fugit id, ipsum laborum molestias nam, non officia, optio quis quisquam recusandae sit.'),
       (1, 'Great product', 'Soushi', 'I love this product'),
       (1, 'Great product', 'Sacha',
        'Dolor dolore doloremque et fugit id, ipsum laborum molestias nam, non officia, optio quis quisquam recusandae sit.'),
       (1, 'Great product', 'Nicolas', 'I love this product');