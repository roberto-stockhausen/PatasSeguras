CREATE DATABASE IF NOT EXISTS roberto_patas_seguras;
USE roberto_patas_seguras;

CREATE TABLE clientes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE clientes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    race VARCHAR(64) NOT NULL
    life VARCHAR(5) NOT NULL
    dono INT NOT NULL,
    CONSTRAINT fk_dono FOREIGN KEY (dono) REFERENCES clientes(id)
);