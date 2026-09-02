<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iTask - Criar Conta</title>
    <link rel="stylesheet" href="templates/css/global.css">
    <link rel="stylesheet" href="templates/css/register.css">
</head>
<body>
    <div class="auth-card">
        <h2>Nova Conta</h2>
        <?php if (!empty($erro)): ?>
            <div class="error-msg"><?= $erro ?></div>
        <?php endif; ?>
        <form action="index.php?action=register" method="POST">
            <div class="input-group">
                <input type="text" name="nome" placeholder="Nome Completo" required>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="input-group">
                <input type="password" name="senha" placeholder="Senha (min. 6 digitos)" required minlength="6">
            </div>
            <button type="submit" class="btn-primary">Cadastrar</button>
        </form>
        <p class="auth-footer">Já possui conta? <a href="index.php?action=login">Faça Login</a></p>
    </div>
</body>
</html>