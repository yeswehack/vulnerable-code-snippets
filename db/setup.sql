/*
* YesWeHack - Vulnerable code snippets
*/

SELECT 
('username=__USER__
password=__PASS__
host=localhost
database=__DB__')
AS 'Credentials';

CREATE DATABASE __DB__;

use `__DB__`;

CREATE USER '__USER__'@'localhost' IDENTIFIED BY '__PASS__';
GRANT CREATE, ALTER, DROP, INSERT, UPDATE, DELETE, SELECT on __DB__.* TO '__USER__'@'localhost' WITH GRANT OPTION;

-- Create products table & columns
CREATE TABLE IF NOT EXISTS products (
    id int NOT NULL AUTO_INCREMENT,
    stock int NOT NULL,
    category varchar(255),
    color varchar(255),
    PRIMARY KEY (id));

-- Create user table & columns
CREATE TABLE IF NOT EXISTS users (
    id int NOT NULL AUTO_INCREMENT,
    csrf varchar(255),
    session varchar(255),
    username varchar(255),
    password varchar(255),
    PRIMARY KEY (id));

-- Insert value to products columns
INSERT INTO  products (
    stock,category,color
    ) VALUES
    (52,'hat','white'),
    (32,'hat','red'),
    (5,'hoodie','blue'),
    (12,'hoodie','black'),
    (75,'t-shirt','yellow'),
    (6,'t-shirt','orange'),
    (4,'t-shirt','black'),
    (57, 't-shirt','yellow'),
    (61,'jacket','black'),
    (11,'jacket','white');


-- Insert value to users columns
INSERT INTO users (
    username,csrf,session,password
    )
    VALUES 
    ('Mario','RandSess','RandSess','secret123'),
    ('james','c4ca4238a0b923820dcc509a6f75849b','c4ca4238a0b923820dcc509a6f75849b','cbfdac6008f9cab4083784cbd1874f76618d2a97'),
    ('billy','c81e728d9d4c2f636f067f89cc14862c','c81e728d9d4c2f636f067f89cc14862c','5cec175b165e3d5e62c9e13ce848ef6feac81bff'),
    ('elsa','eccbc87e4b5ce2fe28308fd9f2a7baf3','eccbc87e4b5ce2fe28308fd9f2a7baf3','99efc50a9206bde3d7a8e694aad8e138ca7dc3f7'),
    ('kate','a87ff679a2f3e71d9181a67b7542122c','a87ff679a2f3e71d9181a67b7542122c','be2dd7fb7a6d0f8ba5add12b5e8fb75bbda64721'),
    ('eric','e4da3b7fbbce2345d7772b0674a318d5','e4da3b7fbbce2345d7772b0674a318d5','7c222fb2927d828af22f592134e8932480637c0d');


