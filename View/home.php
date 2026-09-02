<?php
$data = $_GET['data'] ?? date('Y-m-d');
$tarefas = $tarefas ?? [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iTask - iOS Task Manager</title>
    <link rel="stylesheet" href="templates/css/global.css">
    <link rel="stylesheet" href="templates/css/index.css">
</head>
<body>
    <div class="app-container">
        <header class="app-header">
            <div class="user-info">
                <span>Olá, <strong><?= htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário') ?></strong></span>
                <a href="index.php?action=logout" class="btn-logout">Sair</a>
            </div>
            <h1>Calendário & Tarefas</h1>
            
            <!-- O 'onchange' força a página a recarregar e buscar as tarefas da data selecionada na mesma hora -->
            <input type="date" id="data_filtro" value="<?= htmlspecialchars($data) ?>" onchange="window.location.href='index.php?data=' + this.value">
        </header>

        <section class="add-task-section">
            <form action="index.php?action=cadastrar" method="POST" class="task-form">
                <!-- Mantém a data correta para salvar a nova tarefa -->
                <input type="hidden" name="data_tarefa" value="<?= htmlspecialchars($data) ?>">
                
                <input type="text" name="titulo" placeholder="Nova Tarefa..." required>
                <input type="text" name="descricao" placeholder="Descrição opcional">
                
                <button type="submit" class="btn-add">+</button>
            </form>
        </section>

        <section class="task-list">
            <h3>Tarefas do dia <?= date('d/m/Y', strtotime($data)) ?></h3>
            <?php if (empty($tarefas)): ?>
                <p class="empty-state">Nenhuma tarefa para esta data.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($tarefas as $t): ?>
                        <li class="task-item <?= $t['status'] === 'concluida' ? 'concluida' : '' ?>">
                            <div class="task-details">
                                <strong><?= htmlspecialchars($t['titulo']) ?></strong>
                                <?php if (!empty($t['descricao'])): ?>
                                    <small><?= htmlspecialchars($t['descricao']) ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="task-actions">
                                <a href="index.php?action=alternar_status&id=<?= $t['id'] ?>&data=<?= $data ?>" class="btn-check">
                                    <?= $t['status'] === 'concluida' ? '↺' : '✓' ?>
                                </a>
                                <a href="index.php?action=excluir&id=<?= $t['id'] ?>&data=<?= $data ?>" class="btn-delete">✕</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>