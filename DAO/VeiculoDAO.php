<?php

include 'ConexaoDAO.php';

class VeiculoDAO {

    private $cod;
    private $nome;
    private $tipo;
    private $combustivel;
    private $modelo;
    private $marca;
    private $ano;

    function __construct() {
        if (isset($_POST['nome'])) {
            $this->nome = $_POST['nome'];
            $this->tipo = $_POST['tipo'];
            $this->combustivel = $_POST['combustivel'];
            $this->modelo = $_POST['modelo'];
            $this->marca = $_POST['marca'];
            $this->ano = $_POST['ano'];
        }
    }

    function salvarVeiculo() {
        $retorno = false;
        $query = "INSERT INTO veiculo VALUES (DEFAULT, "
                . "'$this->nome','$this->tipo', '$this->combustivel', '$this->modelo', '$this->marca', '$this->ano', '0');";
        $retorno = executaQuery($query);
        return $retorno;
    }

    function getVeiculos() {
        $query = "SELECT veiculo.codigo as 'codigo', veiculo.nome as 'nome', veiculo.tipo as 'tipo', veiculo.combustivel as 'combustivel', veiculo.modelo as 'modelo', veiculo.marca as 'marca', veiculo.ano as 'ano' FROM veiculo;";
        return executaQueryR($query);
    }

}
