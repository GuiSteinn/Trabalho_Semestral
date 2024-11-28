<?php
session_start();
require 'banco_de_dados.php';

$usuario = $_POST['postgres'];
$senha = $_POST['postgres'];

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
