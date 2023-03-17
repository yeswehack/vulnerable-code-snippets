/*
* YesWeHack - Vulnerable code snippets
*/

SELECT 
('username=__USER__
password=__PASS__
host=localhost
database=__DB__')
AS 'Credentials';

DROP DATABASE IF EXISTS `__DB__`;
CREATE DATABASE `__DB__`;

use `__DB__`;


-- Create products table & columns
CREATE TABLE IF NOT EXISTS products (
    id int NOT NULL AUTO_INCREMENT,
    country VARCHAR(255),
    stock int NOT NULL,
    category VARCHAR(255),
    size VARCHAR(255),
    color VARCHAR(255),
    PRIMARY KEY (id));

-- Create user table & columns
CREATE TABLE IF NOT EXISTS users (
    id int NOT NULL AUTO_INCREMENT,
    csrf VARCHAR(255),
    session VARCHAR(255),
    username VARCHAR(255),
    email VARCHAR(255),
    comment VARCHAR(255),
    verified VARCHAR(255),
    remember VARCHAR(255),
    orders VARCHAR(255),
    resethash VARCHAR(255),
    code VARCHAR(255),
    password VARCHAR(255),
    PRIMARY KEY (id));

-- Insert value to products columns
INSERT INTO  products (
    country, stock, category, size, color
    ) VALUES
    ('US', 52, 'hat', 'S', 'white'),
    ('FR', 0, 'hat', 'XS', 'red'),
    ('AL', 5, 'hoodie', 'L', 'blue'),
    ('FI', 12, 'hoodie', 'XXL', 'black'),
    ('NL', 75, 't-shirt', 'XL', 'yellow'),
    ('SE', 6, 't-shirt', 'S', 'orange'),
    ('EN', 4, 't-shirt', 'M', 'black'),
    ('DE', 57, 't-shirt', 'S', 'yellow'),
    ('GR', 61, 'jacket', 'M', 'black'),
    ('IN', 11, 'jacket', 'L', 'white');


-- Insert value to users columns
INSERT INTO users (
    username, email, comment, verified, remember, orders, csrf, session, resethash, code, password
    )
    VALUES 
    ('Mario', 'Mario@vsnippetmail.com' ,Null, true, false, 3, 'RandSess', 'RandSess', Null, Null, 'secret123'),
    ('james', 'james@vsnippetmail.com' ,Null, true, true, 43, 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', Null, Null, 'cbfdac6008f9cab4083784cbd1874f76618d2a97'),
    ('billy', 'billy@vsnippetmail.com' ,Null, false, false, 25, 'c81e728d9d4c2f636f067f89cc14862c', 'c81e728d9d4c2f636f067f89cc14862c', Null, Null, '5cec175b165e3d5e62c9e13ce848ef6feac81bff'),
    ('elsa', 'elsa@vsnippetmail.com' ,Null, true, false, 12, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', Null, Null, '99efc50a9206bde3d7a8e694aad8e138ca7dc3f7'),
    ('kate', 'kate@vsnippetmail.com' ,Null, false, true, 6, 'a87ff679a2f3e71d9181a67b7542122c', 'a87ff679a2f3e71d9181a67b7542122c', Null, Null, 'be2dd7fb7a6d0f8ba5add12b5e8fb75bbda64721'),
    ('eric', 'eric@vsnippetmail.com' ,Null, false, false, 23, 'e4da3b7fbbce2345d7772b0674a318d5', 'e4da3b7fbbce2345d7772b0674a318d5', Null, Null, '7c222fb2927d828af22f592134e8932480637c0d');


-- Create user
CREATE USER IF NOT EXISTS '__USER__'@'localhost' IDENTIFIED BY '__PASS__';
GRANT CREATE, ALTER, DROP, INSERT, UPDATE, DELETE, SELECT on __DB__.* TO '__USER__'@'localhost' WITH GRANT OPTION;
