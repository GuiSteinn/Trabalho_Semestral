<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="auth.php" method="POST">
        <h2>Login</h2>
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
