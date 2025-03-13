DROP DATABASE IF EXISTS forum;

CREATE DATABASE forum;

USE forum;

CREATE TABLE users (
	user_id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    about_me TEXT NULL,
    profiel_foto BLOB NULL
);