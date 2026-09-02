<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iTask - Entrar</title>
    <link rel="stylesheet" href="templates/css/global.css">
    <link rel="stylesheet" href="templates/css/login.css">
</head>
<body>
    <div class="auth-card">
        <h2>iTask Login</h2>
        <?php if (!empty($erro)): ?>
            <div class="error-msg"><?= $erro ?></div>
        <?php endif; ?>
        <form action="index.php?action=login" method="POST">
            <div class="input-group">
                <input type="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="input-group">
                <input type="password" name="senha" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn-primary">Entrar</button>
        </form>
        <p class="auth-footer">Não tem conta? <a href="index.php?action=register">Cadastre-se</a></p>
    </div>
</body>
</html>