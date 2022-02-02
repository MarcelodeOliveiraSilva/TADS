<?php
require_once('../class/conecta.php');
class cliente {
    private $cod;
    private $nome;
    private $cpf;

    public function __construct($nome, $cpf){
        $this->nome = $nome;
        $this->cpf = $cpf;
    }
    public function getCod(){
        return $this->cod;
    }
    public function getNome(){
        return $this->nome;
    }  
    public function getCpf(){
        return $this->cpf;
    }      
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function setCod($cod){
        $this->cod = $cod;
    }    
}
class clienteDao extends DAO {
    public function inserir($cliente){
        $con=$this->conectaBD();
        $sql = "INSERT INTO cliente (nome, cpf) VALUES (?, ?)";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$cliente->getNome());
        $stm->bindValue(2,$cliente->getCpf());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm = NULL;
        $con = NULL;
        return $res;
    }
    public function deletar($cliente){
        $con = $this->conectaBD();
        $sql = "DELETE FROM cliente WHERE codigo = ?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$cliente->getCod());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm = NULL;
        $con = NULL;
        return $res;
    }
    public function alterar($cliente){
        $con=$this->conectaBD();
        $sql="UPDATE cliente SET nome = ?, cpf = ? WHERE codigo = ? ";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$cliente->getNome());
        $stm->bindValue(2,$cliente->getCpf());
        $stm->bindValue(3,$cliente->getCod());
        $result = $stm->execute();
        
        $stm->closeCursor();
        $stm = NULL;
        $con = NULL;
    }
    public function listaClientes(){
        $con = $this->conectaBD();
        $sql = "SELECT * FROM cliente";
        $stm = $con->prepare($sql);
        $tabela=$stm->execute();
        $clientes = array();
        if($tabela){	
            while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                $cli = new Cliente($linha['nome'],$linha['cpf']);
                $cli->setCod(intval($linha['codigo']));
                array_push($clientes,$cli);
            }
        }
        $stm->closeCursor();
        $stm=NULL;
        $con = NULL;
        return $clientes;
    }

    public function buscar($cod){
        $con = $this->conectaBD();
        $sql = "SELECT * FROM cliente WHERE codigo = ?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$cod);
        $tabela = $stm->execute();
        if($tabela ){
            $linha = $stm->fetch(PDO::FETCH_ASSOC);
            $cli = new Cliente($linha['nome'],$linha['cpf']);
            $cli->setCod(intval($linha['codigo']));
        }
        $stm->closeCursor();
        $stm=NULL;
        $con = NULL;
        return $cli;
    } 
}
?>