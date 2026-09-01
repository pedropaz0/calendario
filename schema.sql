CREATE DATABASE IF NOT EXISTS itask_db;
USE itask_db;

CREATE TABLE IF NOT EXISTS tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    data_tarefa DATE NOT NULL,
    status ENUM('pendente', 'concluida') DEFAULT 'pendente',
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);