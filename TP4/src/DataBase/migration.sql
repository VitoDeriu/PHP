DROP DATABASE users; 

CREATE DATABASE IF NOT EXISTS users; 

USE DATABASE users;

CREATE TABLE IF NOT EXISTS user(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO user(username, email, password)
VALUES("Kantin", "kantin@kantin.com", "kakantin");

