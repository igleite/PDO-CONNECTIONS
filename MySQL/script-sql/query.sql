USE mysql;

DROP DATABASE IF EXISTS PDO;
CREATE DATABASE PDO;

USE PDO;

DROP TABLE IF EXISTS Vendas;
CREATE TABLE Vendas
(
    Id      INT AUTO_INCREMENT PRIMARY KEY,
    DtVenda TIMESTAMP,
    Nome    VARCHAR(50) NOT NULL,
    Qtd     INT,
    Valor   DECIMAL(10, 2)
);

INSERT INTO Vendas (Nome, Qtd, Valor)
VALUES ('Teclado', 10, 300.50),
       ('Mouse', 50, 100.00),
       ('Monitor', 3, 900),
       ('Notebook', 2, 5000),
       ('Monitor', 10, 1000);

SELECT *
FROM Vendas;
