DROP DATABASE IF EXISTS b2tp3; 


CREATE DATABASE IF NOT EXISTS b2tp3; 


CREATE USER IF NOT EXISTS 'jean_charles_michel'@'localhost' IDENTIFIED BY 'password';

GRANT ALL ON b2tp3.* TO 'jean_charles_michel'@'localhost';

USE b2tp3; 

CREATE TABLE IF NOT EXISTS user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS interest (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS interest_user (
    user_id INT, 
    interest_id INT,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE, 
    FOREIGN KEY (interest_id) REFERENCES interest(id) ON DELETE CASCADE, 
    PRIMARY KEY(user_id, interest_id)
);

CREATE TABLE IF NOT EXISTS interest(
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS profile(
    id int PRIMARY KEY, 
    FOREIGN KEY (id) REFERENCES user(id) ON DELETE CASCADE, 
    avatar VARCHAR(255) DEFAULT NULL,
    profile_picture BLOB DEFAULT NULL
);

INSERT INTO user(email, password) VALUES('toto@toto.com', '$2y$10$zu409vt5nI4EZ3NQOPeTRuiqNhZjmrwHWgdYcV6FTlK/BZH/C08Lq');
INSERT INTO interest(name)  VALUES('sport'), ('musique'), ('cinéma'), ('lecture'), ('jeux vidéos'), ('téléphone'), ('baby-foot'), ('faire cliquer la souris');