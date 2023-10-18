CREATE DATABASE usuarios;
USE usuarios;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(40),
    cpf VARCHAR(13),
    telefone VARCHAR(13),
    data_nascimento DATE,
    email VARCHAR(40),
    senha VARCHAR(13),
    cep VARCHAR(13),
    rua VARCHAR(40),
    numero VARCHAR(13),
    complemento VARCHAR(40),
    bairro VARCHAR(13),
    cidade VARCHAR(13),
    estado VARCHAR(13)
);

Select * from clientes;
