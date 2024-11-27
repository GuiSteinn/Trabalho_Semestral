<?php
require_once "FormularioControlador.php";

$controlador = new FormularioControlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'id_setor' => $_POST['id_setor'],
        'id_pergunta' => $_POST['id_pergunta'],
        'id_dispositivo' => $_POST['id_dispositivo'],
        'resposta' => $_POST['resposta'],
        'texto_feedback' => $_POST['texto_feedback'] ?? null
    ];

    if ($controlador->enviarFeedback($dados)) {
        header("Location: /obrigado.php");
        exit;
    } else {
        echo "Erro ao salvar sua avaliação.";
    }
} else {
    $perguntas = $controlador->obterPerguntas();
    include "formulario.php";
}
