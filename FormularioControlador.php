<?php
require_once "banco_de_dados.php";
require_once "PerguntaModelo.php";
require_once "FeedbackModelo.php";

class FormularioControlador {
    private $banco;

    public function __construct() {
        $bancoDeDados = new BancoDeDados();
        $this->banco = $bancoDeDados->obterConexao();
    }

    public function obterPerguntas() {
        $perguntaModelo = new PerguntaModelo($this->banco);
        return $perguntaModelo->obterPerguntasAtivas();
    }

    public function enviarFeedback($dados) {
        $feedbackModelo = new FeedbackModelo($this->banco);
        return $feedbackModelo->salvarFeedback(
            $dados['id_setor'],
            $dados['id_pergunta'],
            $dados['id_dispositivo'],
            $dados['resposta'],
            $dados['texto_feedback']
        );
    }
}
