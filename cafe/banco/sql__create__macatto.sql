CREATE DATABASE banco_macatto2;

USE banco_macatto2;

CREATE TABLE condominio (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(60) NOT NULL UNIQUE, 
    cpj VARCHAR(20) NOT NULL UNIQUE, 
    escricao_estadual VARCHAR(20), 
    valor_contrato DECIMAL (5,2) NOT NULL,
    cidade VARCHAR(20),
    setor VARCHAR(20),
    endereco VARCHAR(20),
    contato VARCHAR(20) UNIQUE,
    email VARCHAR(20) UNIQUE,
    imagem VARCHAR(80)
);

INSERT INTO condominio (nome, cpj, escricao_estadual, valor_contrato, cidade, setor, endereco, contato, email, imagem) 
    VALUES 
    ('Morada nova 1', '28.627.988/0001-31', '28.627.988/0001-32','R$ 1.000', 'Goiânia', 'Marista', 'Rua 17, N. 514', '62 998592-1141', 'admin1@gmail.com', 'imagem padrão'),
    ('Morada nova 2', '28.627.988/0001-32', '28.627.988/0001-32','R$ 1.000', 'Goiânia', 'Marista', 'Rua 17, N. 514', '62 998592-1142', 'admin2@gmail.com', 'imagem padrão'),
    ('Morada nova 3', '28.627.988/0001-33', '28.627.988/0001-32','R$ 1.000', 'Goiânia', 'Marista', 'Rua 17, N. 514', '62 998592-1143', 'admin3@gmail.com', 'imagem padrão'),
    ('Morada nova 4', '28.627.988/0001-34', '28.627.988/0001-32','R$ 1.000', 'Goiânia', 'Marista', 'Rua 17, N. 514', '62 998592-1144', 'admin4@gmail.com', 'imagem padrão'),
    ('Morada nova 5', '28.627.988/0001-35', '28.627.988/0001-32','R$ 1.000', 'Goiânia', 'Marista', 'Rua 17, N. 514', '62 998592-1145', 'admin5@gmail.com', 'imagem padrão'),
    ('Morada nova 6', '28.627.988/0001-36', '28.627.988/0001-32','R$ 1.000', 'Goiânia', 'Marista', 'Rua 17, N. 514', '62 998592-1146', 'admin6@gmail.com', 'imagem padrão'),
    ('Morada nova 7', '28.627.988/0001-37', '28.627.988/0001-32','R$ 1.000', 'Goiânia', 'Marista', 'Rua 17, N. 514', '62 998592-1147', 'admin7@gmail.com', 'imagem padrão'),
    ('Morada nova 8', '28.627.988/0001-38', '28.627.988/0001-32','R$ 1.000', 'Goiânia', 'Marista', 'Rua 17, N. 514', '62 998592-1148', 'admin8@gmail.com', 'imagem padrão'),
    ('Morada nova 9', '28.627.988/0001-39', '28.627.988/0001-32','R$ 1.000', 'Goiânia', 'Marista', 'Rua 17, N. 514', '62 998592-1149', 'admin9@gmail.com', 'imagem padrão'
);