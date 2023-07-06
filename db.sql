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

INSERT INTO shop (name,address)

VALUES

('Baker', '3 rue Lilas'),

('Ali', '10 rue Paris'),

('Stevenson', '4 rue Adams Arcade');




INSERT INTO orderItem (quantity,itemPrice)

VALUES

(5, 10),

(10,5),

(5,15);




INSERT INTO `order` (createdAt,CustomerName)

VALUES

(1974-12-20,'Alice Baker'),

(1990-02-22,'Anne Roberts'),

(1998-06-22,'Mackenzi Jean');




INSERT INTO fleur (label,basePrice,description,picture)

VALUES

('a', 10,'Natural rose flower','https://images.unsplash.com/photo-1562690868-60bbe7293e94?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=718&q=80'),

('b', 20,'Beautiful tulip','https://images.unsplash.com/photo-1520763185298-1b434c919102?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8dHVsaXB8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=600&q=60'),

('c',15, 'Sunflower that smells wonderful','https://unsplash.com/fr/photos/2IzoIHBgYAo');




INSERT INTO option (label,price)

VALUES

('ab',50),

('bc',150),

('de',70);

