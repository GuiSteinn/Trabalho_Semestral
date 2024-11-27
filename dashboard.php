<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Dashboard</h1>
    <canvas id="grafico" width="400" height="200"></canvas>
    <script>
        // Dados de exemplo (substituir pela API de dados)
        const data = {
            labels: ['Recepção', 'Enfermagem', 'Alimentação'],
            datasets: [{
                label: 'Média de Pontuação',
                data: [8.5, 7.3, 9.1],
                backgroundColor: ['#4CAF50', '#FF9800', '#2196F3']
            }]
        };

        const config = {
            type: 'bar',
            data: data,
        };

        new Chart(document.getElementById('grafico'), config);
    </script>
</body>
</html>
