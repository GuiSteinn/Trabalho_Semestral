<?php
class BancoDeDados {
    private $host = "localhost";
    private $nome_banco = "TrabalhoSemestral";
    private $usuario = "postgres";
    private $senha = "postgres";
    public $conexao;

    public function obterConexao() {
        $this->conexao = null;
        try {
            $this->conexao = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->nome_banco, $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $excecao) {
            echo "Erro na conexão: " . $excecao->getMessage();
        }
        return $this->conexao;
    }
}
