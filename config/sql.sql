-- pgsql:host=localhost;
-- port=5433;
-- dbname=db_funcionarios;
-- username=postgres;
-- password=0000;

CREATE DATABASE db_funcionarios;

CREATE TABLE tb_funcionario (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    logradouro VARCHAR(100),
    cep VARCHAR(9),
    cidade VARCHAR(50),
    estado VARCHAR(50),
    numero VARCHAR(10),
    complemento VARCHAR(100),
    cargo_id INT,
    FOREIGN KEY (cargo_id) REFERENCES tb_cargo(cargo_id)
);

CREATE TABLE tb_cargo (
    cargo_id SERIAL PRIMARY KEY,
    nome_cargo VARCHAR(100) NOT NULL
);
