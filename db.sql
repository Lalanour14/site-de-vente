-- Active: 1685437604518@@127.0.0.1@3306@db_sql
DROP TABLE IF EXISTS orderitemoption;
DROP TABLE IF EXISTS orderItem;
DROP TABLE IF EXISTS `order`;
DROP TABLE IF EXISTS `option`;
DROP TABLE IF EXISTS fleur;
DROP TABLE IF EXISTS shop;


CREATE TABLE shop (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL
);
CREATE TABLE fleur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255) NOT NULL,
    basePrice FLOAT,
    description VARCHAR(255),
    picture VARCHAR(255) NOT NULL
);
CREATE TABLE `option` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255) NOT NULL,
    price FLOAT
);
CREATE TABLE `order` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    createdAt DATETIME,
    customerName VARCHAR(255)
);
CREATE TABLE orderItem (
    id INT PRIMARY KEY AUTO_INCREMENT,
    quantity INT,
    itemPrice FLOAT,
    id_order INT,
    id_fleur INT,
    FOREIGN KEY (id_order) REFERENCES `order`(id),
    FOREIGN KEY (id_fleur) REFERENCES fleur(id));    
CREATE TABLE orderitemoption (
    PRIMARY KEY (id_orderitem,id_option),
    id_orderitem INT,
    id_option INT,
    FOREIGN KEY (id_orderitem) REFERENCES orderitem(id),
    FOREIGN KEY (id_option) REFERENCES `option`(id));

