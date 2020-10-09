-- Delete existing database and user
DROP DATABASE IF EXISTS ls_bank;
DROP USER IF EXISTS 'ls_bank_user'@'localhost';

-- Create database with utf-8 characters
CREATE DATABASE ls_bank CHARACTER SET 'utf8';
USE ls_bank;

-- Create user and his privileges
CREATE USER 'ls_bank_user'@'localhost' IDENTIFIED BY 'mdp';
GRANT ALL ON ls_bank.* TO 'ls_bank_user'@'localhost';

-- Create banque_php tables

-- Customer table creation 
CREATE TABLE Customer (
    id INT UNSIGNED AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(320) NOT NULL UNIQUE,    
    pass VARCHAR(320) NOT NULL,
    PRIMARY KEY(id)
)
ENGINE = InnoDB;
-- Customer table filling 
INSERT INTO Customer (firstname, lastname, email, pass)
VALUES  ('Jeanne', 'Dos', 'jeanne.dos@gmail.com', 'jdf'),
        ('Jean', 'Deau', 'jeandeau@gmail.com', 'jdm'),
        ('Michel', 'Cemisse', 'michel-cemisse@hotmail.com', 'mcm');

-- Account table creation 
CREATE TABLE Account (
    id INT UNSIGNED AUTO_INCREMENT,
    label VARCHAR(30) NOT NULL,
    iban VARCHAR(30) NOT NULL UNIQUE,
    date_creation TIMESTAMP NOT NULL,    
    balance DECIMAL(19,2) NOT NULL,
    customer_id INT UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_customer_id FOREIGN KEY (customer_id) REFERENCES Customer(id) 
)
ENGINE = InnoDB;
-- Account table filling 
INSERT INTO Account (label, iban, date_creation, balance, customer_id)
VALUES  ('Compte courant', '3500 0004 5888 5666', '1447597943', -256.24, 1),
        ('Livret A', '3500 0004 7474 9696', '1472804372', 569.96, 1),
        ('Compte courant', '3500 0005 1221 4659', '1266231631', 1256.00, 2),
        ('Plan Epargne Logement (PEL)', '3500 0005 7448 3942', '1558983479', 10248.69, 2),
        ('Compte courant', '3500 0006 4566 9832', '978618730', -50.01, 3),
        ('Livret de développement durable (LDD)', '3500 0006 1618 3874', '1354056600', 21653.36, 3);

-- Transaction table creation 
CREATE TABLE Transaction (
    id INT UNSIGNED AUTO_INCREMENT,
    date_transaction TIMESTAMP NOT NULL,
    amount DECIMAL(19,2) NOT NULL,
    is_credit TINYINT(1) NOT NULL,    
    comments TEXT NULL,
    account_id INT UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_account_id FOREIGN KEY (account_id) REFERENCES Account(id) 
)
ENGINE = InnoDB;
-- Transaction table filling 
INSERT INTO Transaction (date_transaction, amount, is_credit, comments, account_id)
VALUES  ('1588496658', 150.00, 1, 'Joyeux anniversaire fillette', 1),
        ('1587924730', 50.00, 0, '', 1),
        ('1594548610', 50.00, 1, '', 2),
        ('1601763556', 20.00, 0, 'Retrait DAB', 3);
