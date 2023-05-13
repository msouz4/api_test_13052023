<?php
require_once 'C:\xampp\htdocs\api\config\db.php';

class Data extends db{
    private string $produto;
    private string $cor;
    private string $tamanho;
    private string $deposito;
    private string $data_disponibilidade;
    private int $quantidade;

    function getProduto() {
        return $this->produto;
    }

    function getCor() {
        return $this->cor;
    }

    function getTamanho() {
        return $this->tamanho;
    }

    function getDeposito() {
        return $this->deposito;
    }

    function getData_disponibilidade() {
        return $this->data_disponibilidade;
    }
    function getQuantidade() {
        return $this->quantidade;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }
    function setCor($cor) {
        $this->cor = $cor;
    }
    function setDeposito($deposito) {
        $this->deposito = $deposito ;
    }
    function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }
    function setData_disponibilidade ($data_disponibilidade) {
        $this->data_disponibilidade = $data_disponibilidade;
    }
    function setQuantidade ($quantidade ) {
        $this->quantidade  = $quantidade ;
    }

    public function insert($obj){
    	$sql = "INSERT INTO estoque (
            produto,
            cor,
            tamanho,
            deposito,
            data_disponibilidade,
            quantidade
        ) 
        VALUES (
            :produto,
            :cor,
            :tamanho,
            :deposito,
            :data_disponibilidade,
            :quantidade
        )";
    	$consulta = db::prepare($sql);
        $consulta->bindValue('produto', $obj->produto);
        $consulta->bindValue('cor', $obj->cor);
        $consulta->bindValue('tamanho', $obj->tamanho);
        $consulta->bindValue('deposito', $obj->deposito);
        $consulta->bindValue('data_disponibilidade', $obj->data_disponibilidade);
        $consulta->bindValue('quantidade', $obj->quantidade);
        if ($consulta->execute() != true){
            db::rollBack();
            throw new Exception("Error Processing Insert", 1);
        }
        return true;
	}

	public function update($obj){
		$sql = "UPDATE estoque SET 
                produto = :produto,
                cor = :cor,
                tamanho = :tamanho,
                deposito = :deposito,
                data_disponibilidade = :data_disponibilidade,
                quantidade = :quantidade
            WHERE 
                produto = :produto
        ";
		$consulta = db::prepare($sql);
        $consulta->bindValue('produto', $obj->produto);
        $consulta->bindValue('cor', $obj->cor);
        $consulta->bindValue('tamanho', $obj->tamanho);
        $consulta->bindValue('deposito', $obj->deposito);
        $consulta->bindValue('data_disponibilidade', $obj->data_disponibilidade);
        $consulta->bindValue('quantidade', $obj->quantidade);
		if ($consulta->execute() != true){
            db::rollBack();
            throw new Exception("Error Processing Update", 1);
        }
        return true;
	}

	public function findAll(){
		$sql = "SELECT * FROM estoque";
		$consulta = db::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
	}

}

?>