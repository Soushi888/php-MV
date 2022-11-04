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
    content    TEXT         NOT NULL
) engine = InnoDB;

INSERT INTO reviews (product_id, title, name, rating, content)
VALUES (1, 'Great product', 'John', 5, 'I love this product'),
       (1, 'Great product', 'Jane', 4,
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam asperiores beatae cumque dolor dolore doloremque et fugit id, ipsum laborum molestias nam, non officia, optio quis quisquam recusandae sit.'),
       (1, 'Great product', 'Soushi', 5, 'I love this product'),
       (1, 'Great product', 'Sacha', 2,
        'Dolor dolore doloremque et fugit id, ipsum laborum molestias nam, non officia, optio quis quisquam recusandae sit.'),
       (1, 'Great product', 'Nicolas', 3, 'I love this product'),
       (2, 'Nice !!', 'Sacha', 5, 'Thank you !');