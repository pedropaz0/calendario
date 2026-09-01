<?php
require_once __DIR__ . '/config/db.php';

$data_selecionada = $_GET['data'] ?? date('Y-m-d');

$stmt = $pdo->prepare("SELECT * FROM tarefas WHERE data_tarefa = :data ORDER BY id DESC");
$stmt->execute([':data' => $data_selecionada]);
$tarefas = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iTask - Calendário iOS</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="iphone-container">
    <div class="header-date">
        <?= date('D, d \d\e M', strtotime($data_selecionada)) ?>
    </div>
    <h1 class="title">Eventos e Tarefas</h1>

    <input type="date" id="datePicker" class="date-picker" value="<?= htmlspecialchars($data_selecionada) ?>">

    <form class="task-form" action="acoes.php" method="POST">
        <input type="hidden" name="acao" value="criar">
        <input type="hidden" name="data_tarefa" value="<?= htmlspecialchars($data_selecionada) ?>">
        <input type="text" name="titulo" placeholder="Título do evento" required>
        <textarea name="descricao" placeholder="Descrição (opcional)" rows="2"></textarea>
        <button type="submit">Adicionar Evento</button>
    </form>

    <ul class="task-list">
        <?php if (empty($tarefas)): ?>
            <p class="empty-state">Nenhum evento agendado para este dia.</p>
        <?php else: ?>
            <?php foreach ($tarefas as $tarefa): ?>
                <li class="task-item">
                    <div class="task-info">
                        <a href="acoes.php?toggle=<?= $tarefa['id'] ?>&data=<?= htmlspecialchars($data_selecionada) ?>" 
                           class="btn-check <?= $tarefa['status'] === 'concluida' ? 'checked' : '' ?>"></a>
                        <div>
                            <p class="task-title <?= $tarefa['status'] === 'concluida' ? 'concluida' : '' ?>">
                                <?= htmlspecialchars($tarefa['titulo']) ?>
                            </p>
                            <?php if (!empty($tarefa['descricao'])): ?>
                                <p class="task-desc"><?= htmlspecialchars($tarefa['descricao']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <a href="acoes.php?deletar=<?= $tarefa['id'] ?>&data=<?= htmlspecialchars($data_selecionada) ?>" 
                       class="btn-delete">Apagar</a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>


<script src="assets/js/main.js"></script>
</body>
</html>