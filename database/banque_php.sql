-- Delete existing database and user
DROP DATABASE IF EXISTS banque_php;
DROP USER IF EXISTS 'banquePHP'@'*';

-- Create database with utf-8 characters
CREATE DATABASE banque_php CHARACTER SET 'utf8';

-- Create user and his privileges
CREATE USER 'banquePHP'@'*' IDENTIFIED BY 'mdp';
GRANT ALL ON banque_php.* TO 'banquePHP'@'*';

-- Create banque_php tables

-- Customer table creation 
CREATE TABLE Customer (
    id INT UNSIGNED AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(320) NOT NULL UNIQUE,    
    pass VARCHAR(30) NOT NULL,
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
    date_creation DATE NOT NULL,    
    balance DECIMAL(19,2) NOT NULL,
    customer_id INT UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_customer_id FOREIGN KEY (customer_id) REFERENCES Customer(id) 
)
ENGINE = InnoDB;
-- Account table filling 
INSERT INTO Account (label, iban, date_creation, balance, customer_id)
VALUES  ('Compte courant', '3500 0004 5888 5666', '2015-11-15', -256.24, 1),
        ('Livret A', '3500 0004 7474 9696', '2016-09-01', 569.96, 1),
        ('Compte courant', '3500 0005 1221 4659', '2010-02-15', 1256.00, 2),
        ('Plan Epargne Logement (PEL)', '3500 0005 7448 3942', '2019-05-27', 10248.69, 2),
        ('Compte courant', '3500 0006 4566 9832', '2001-01-04', -50.01, 3),
        ('Livret de développement durable (LDD)', '3500 0006 1618 3874', '2012-11-29', 21653.36, 3);

-- Transaction table creation 
CREATE TABLE Transaction (
    id INT UNSIGNED AUTO_INCREMENT,
    date_transaction DATETIME NOT NULL,
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
VALUES  ('2020-05-03 16:35:25', 150.00, 1, 'Joyeux anniversaire fillette', 1),
        ('2020-04-26 09:15:22', 50.00, 0, '', 1),
        ('2020-04-26 09:15:23', 50.00, 1, '', 2),
        ('2020-10-03 22:55:59', 20.00, 0, 'Retrait DAB', 3);
