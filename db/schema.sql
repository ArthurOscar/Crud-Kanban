CREATE DATABASE crud_kanban;
USE crud_kanban;

CREATE TABLE usuarios (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL
);

CREATE TABLE tarefas (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(255) NOT NULL,
    nome_setor VARCHAR(45) NOT NULL,
    prioridade ENUM('Baixa', 'Média', 'Alta') NOT NULL,
    data_cadastro DATETIME NOT NULL DEFAULT(current_timestamp),
    status ENUM('A fazer', 'Fazendo', 'Pronto') NOT NULL DEFAULT('A fazer'),
    fk_usuario INT NOT NULL,
    FOREIGN KEY (fk_usuario) REFERENCES usuarios(id)
);