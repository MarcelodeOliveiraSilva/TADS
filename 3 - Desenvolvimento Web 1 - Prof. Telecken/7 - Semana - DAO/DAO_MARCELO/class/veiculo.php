<?php

require_once('../func/conectar.php');

class veiculo{
    private $codigo;
    private $modelo;
    private $placa;

    public function __construct($modelo,$placa){
        $this->modelo = $modelo;
        $this->placa = $placa;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getPlaca(){
        return $this->placa;
    }
    public function setPlaca($placa){
        $this->placa = $placa;
    }

}

class veiculoDao extends DAO{
    public function inserirVeiculo($veiculo){
        $con=$this->conecta();
        $sql= "INSERT INTO veiculo (modelo,placa) values (?,?)";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$veiculo->getModelo());
        $stm->bindValue(2,$veiculo->getPlaca());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm=NULL;
        $con=null;
        return $res;
    }

    public function deletaVeiculo($veiculo){
        $con=$this->conecta();
        $sql="DELETE FROM veiculo where codigo=?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$veiculo->getCodigo());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm=NULL;
        $con=null; 
        return $res;
    }

    public function alteraVeiculo($veiculo){
        $con=$this->conecta();
        $sql ="UPDATE veiculo SET modelo=?, placa= ? WHERE codigo = ?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$veiculo->getModelo());
        $stm->bindValue(2,$veiculo->getPlaca());
        $stm->bindValue(3,$veiculo->getCodigo());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm=NULL;
        $con=null; 
        return $res;
    }

    public function listaVeiculo(){
        $con = $this->conecta();
        $sql = "SELECT codigo, modelo, placa FROM veiculo";
        $stm = $con->prepare($sql);
        $tabela=$stm->execute();
        $veiculos = array();

        if($tabela){
            while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                $vei = new veiculo($linha['modelo'],$linha['placa']);
                $vei->setCodigo(intval($linha['codigo']));
                array_push($veiculos,$vei);
            }
        }

        $stm->closeCursor();
        $stm=NULL;
        $con = NULL;
        return $veiculos;
    }

    public function buscaVeiculo($codigo){
        $con = $this->conecta();
        $sql = "SELECT * FROM veiculo WHERE codigo = ?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$codigo);
        $tabela = $stm->execute();
        if($tabela ){
            $linha = $stm->fetch(PDO::FETCH_ASSOC);
            $vei = new veiculo($linha['modelo'],$linha['placa']);
            $vei->setCodigo(intval($linha['codigo']));
        }
        $stm->closeCursor();
        $stm=NULL;
        $con = NULL;
        return $vei;
    } 
}