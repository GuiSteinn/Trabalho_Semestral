<?php
class PerguntaModelo
{
    private $conexao;
    private $tabela = "perguntas";

    public function __construct($banco)
    {
        $this->conexao = $banco;
    }

    public function obterPerguntasAtivas()
    {
        $consulta = "SELECT * FROM " . $this->tabela . " WHERE status = 'ativa' ORDER BY id ASC";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
