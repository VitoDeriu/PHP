DROP DATABASE IF EXISTS b2_php_tp4; 

CREATE DATABASE IF NOT EXISTS b2_php_tp4; 

USE b2_php_tp4;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(200) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users(username, email, password)
VALUE ("Kantin", "kantin@kantin.cum", "password");