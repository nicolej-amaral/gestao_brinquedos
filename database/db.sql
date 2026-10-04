CREATE DATABASE Cadastro_brinquedos;

USE Cadastro_brinquedos;

CREATE TABLE brinquedos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    categoria VARCHAR(200) NOT NULL,
    faixa_etaria INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade INT NOT NULL

);

