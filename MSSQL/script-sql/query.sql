USE master
GO

IF DB_ID('PDO') IS NOT NULL
    DROP DATABASE PDO
CREATE DATABASE PDO
GO

USE PDO
GO

DROP TABLE IF EXISTS Vendas
CREATE TABLE Vendas
(
    Id      INT IDENTITY (1,1) PRIMARY KEY,
    DtVenda DATETIME,
    Nome    VARCHAR(50) NOT NULL,
    Qtd     INT,
    Valor   MONEY
);

INSERT INTO Vendas (DtVenda, Nome, Qtd, Valor)
VALUES (GETDATE(), 'Teclado', 10, 300.50),
       (GETDATE(), 'Mouse', 50, 100.00),
       (GETDATE(), 'Monitor', 3, 900),
       (GETDATE(), 'Notebook', 2, 5000),
       (GETDATE(), 'Monitor', 10, 1000);

SELECT *
FROM Vendas;
