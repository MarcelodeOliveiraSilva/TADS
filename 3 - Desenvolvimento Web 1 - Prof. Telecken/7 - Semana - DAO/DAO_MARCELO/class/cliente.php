<?php

require_once('../func/conectar.php');

class cliente{
    private $codigo;
    private $nome;
    private $telefone;

    public function __construct($nome,$telefone){
        $this->nome = $nome;
        $this->telefone = $telefone;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

}

class clienteDao extends DAO{
    public function inserirCliente($cliente){
        $con=$this->conecta();
        $sql= "INSERT INTO cliente (nome,telefone) values (?,?)";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$cliente->getNome());
        $stm->bindValue(2,$cliente->getTelefone());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm=NULL;
        $con=null;
        return $res;
    }

    public function deletaCliente($cliente){
        $con=$this->conecta();
        $sql="DELETE FROM cliente where codigo=?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$cliente->getCodigo());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm=NULL;
        $con=null; 
        return $res;
    }

    public function alteraCliente($cliente){
        $con=$this->conecta();
        $sql ="UPDATE cliente SET nome=?, telefone= ? WHERE codigo = ?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$cliente->getNome());
        $stm->bindValue(2,$cliente->getTelefone());
        $stm->bindValue(3,$cliente->getCodigo());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm=NULL;
        $con=null; 
        return $res;
    }

    public function listaClientes(){
        $con = $this->conecta();
        $sql = "SELECT codigo, nome, telefone FROM cliente";
        $stm = $con->prepare($sql);
        $tabela=$stm->execute();
        $clientes = array();

        if($tabela){
            while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                $cli = new cliente($linha['nome'],$linha['telefone']);
                $cli->setCodigo(intval($linha['codigo']));
                array_push($clientes,$cli);
            }
        }

        $stm->closeCursor();
        $stm=NULL;
        $con = NULL;
        return $clientes;
    }

    public function buscaCliente($codigo){
        $con = $this->conecta();
        $sql = "SELECT * FROM cliente WHERE codigo = ?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$codigo);
        $tabela = $stm->execute();
        if($tabela ){
            $linha = $stm->fetch(PDO::FETCH_ASSOC);
            $cli = new Cliente($linha['nome'],$linha['telefone']);
            $cli->setCodigo(intval($linha['codigo']));
        }
        $stm->closeCursor();
        $stm=NULL;
        $con = NULL;
        return $cli;
    } 
}