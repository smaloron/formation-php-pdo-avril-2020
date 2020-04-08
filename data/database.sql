-- Suppression de la base de données si elle existe
DROP DATABASE IF EXISTS formation_php;

-- Création de la base de données
CREATE DATABASE formation_php 
    DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE formation_php;

-- table des professions
CREATE TABLE professions (
    id TINYINT UNSIGNED AUTO_INCREMENT,
    profession_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id) 
);

-- Création de la table des personnes
CREATE TABLE persons (
    id SMALLINT UNSIGNED AUTO_INCREMENT,
    person_name VARCHAR(30) NOT NULL,
    first_name VARCHAR(30),
    profession_id TINYINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT persons_to_professions
        FOREIGN KEY (profession_id)
        REFERENCES professions(id)
);

CREATE TABLE addresses (
    id SMALLINT UNSIGNED AUTO_INCREMENT,
    address VARCHAR(38) NOT NULL,
    zip_code CHAR(5) NOT NULL,
    city VARCHAR(38) NOT NULL,
    person_id SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT adresses_to_persons
        FOREIGN KEY (person_id)
        REFERENCES persons(id)
);

-- Insertion des données

INSERT INTO professions (profession_name)
VALUES ('Développeur'), ('Chef de projet'), ('Mathématicien'),
('Ecrivain'), ('Formateur');

INSERT INTO persons (person_name, first_name, profession_id)
VALUES 
('Hugo', 'Victor', 4), ('Sand', 'Georges', 4), 
('Lovelace', 'Ada', 3), ('Hopper', 'Grace', 3);

INSERT INTO addresses (address, zip_code, city, person_id)
VALUES
('5 rue Orfila', '75020', 'Paris', 1),
('148 rue de Picpus', '75012', 'Paris', 2),
('3 rue Calixte XII', '25440', 'Quingey', 3);

-- Création de la vue pour simplifier les requêtes sur les personnes
CREATE OR REPLACE VIEW view_persons AS
SELECT  p.id, person_name, first_name, zip_code, city, profession_name
        , CONCAT_WS(' ', first_name, person_name) as full_name
        FROM persons AS p 
            LEFT JOIN addresses ON p.id = person_id
            INNER JOIN professions ON professions.id = profession_id;