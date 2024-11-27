<?php
class FeedbackModelo
{
    private $conexao;
    private $tabela = "feedback";

    public function __construct($banco)
    {
        $this->conexao = $banco;
    }

    public function salvarFeedback($id_setor, $id_pergunta, $id_dispositivo, $resposta, $texto_feedback)
    {
        $consulta = "INSERT INTO " . $this->tabela . " (id_setor, id_pergunta, id_dispositivo, resposta, texto_feedback, criado_em) 
                     VALUES (:id_setor, :id_pergunta, :id_dispositivo, :resposta, :texto_feedback, NOW())";

        $stmt = $this->conexao->prepare($consulta);
        $stmt->bindParam(":id_setor", $id_setor);
        $stmt->bindParam(":id_pergunta", $id_pergunta);
        $stmt->bindParam(":id_dispositivo", $id_dispositivo);
        $stmt->bindParam(":resposta", $resposta);
        $stmt->bindParam(":texto_feedback", $texto_feedback);

        return $stmt->execute();
    }
}
