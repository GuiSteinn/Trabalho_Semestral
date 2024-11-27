<?php
session_start();
require 'conexao.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Busca no banco de dados
$sql = "SELECT * FROM usuarios WHERE usuario = $1";
$result = pg_query_params($conn, $sql, [$usuario]);

if ($row = pg_fetch_assoc($result)) {
    if (password_verify($senha, $row['senha'])) {
        $_SESSION['usuario'] = $usuario;
        header('Location: dashboard.php');
        exit();
    }
}

header('Location: login.php?erro=1');
?>
