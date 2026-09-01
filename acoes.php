<?php
require_once __DIR__ . '/config/db.php';

// Criar Tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'criar') {
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    $data_tarefa = $_POST['data_tarefa'];

    if (!empty($titulo) && !empty($data_tarefa)) {
        $stmt = $pdo->prepare("INSERT INTO tarefas (titulo, descricao, data_tarefa) VALUES (:titulo, :descricao, :data_tarefa)");
        $stmt->execute([
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':data_tarefa' => $data_tarefa
        ]);
    }
    header("Location: index.php?data=" . urlencode($data_tarefa));
    exit;
}

// Alternar Status (Concluída/Pendente)
if (isset($_GET['toggle'])) {
    $id = (int)$_GET['toggle'];
    $data = $_GET['data'] ?? date('Y-m-d');
    
    $stmt = $pdo->prepare("UPDATE tarefas SET status = IF(status='pendente', 'concluida', 'pendente') WHERE id = :id");
    $stmt->execute([':id' => $id]);
    
    header("Location: index.php?data=" . urlencode($data));
    exit;
}

// Deletar Tarefa
if (isset($_GET['deletar'])) {
    $id = (int)$_GET['deletar'];
    $data = $_GET['data'] ?? date('Y-m-d');
    
    $stmt = $pdo->prepare("DELETE FROM tarefas WHERE id = :id");
    $stmt->execute([':id' => $id]);
    
    header("Location: index.php?data=" . urlencode($data));
    exit;
}