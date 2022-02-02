<?php

require_once('../func/conectar.php');

class aluguel{
    private $codigo;
    private $cliente;
    private $veiculo;
    private $preco;
    private $datainicio;
    private $datafim;
    private $situacao;

    public function __construct($cliente, $veiculo, $preco, $datainicio,$datafim, $situacao){
        $this->cliente = $cliente;
        $this->veiculo = $veiculo;
        $this->preco = $preco;
        $this->datainicio = $datainicio;
        $this->datafim = $datafim;
        $this->situacao = $situacao;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getCliente(){
        return $this->cliente;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function getVeiculo(){
        return $this->veiculo;
    }
    public function setVeiculo($veiculo){
        $this->veiculo = $veiculo;
    }

    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getDataInicio(){
        return $this->datainicio;
    }
    public function setDataInicio($datainicio){
        $this->datainicio = $datainicio;
    }

    public function getDataFim(){
        return $this->datafim;
    }
    public function setDataFim($datafim){
        $this->datafim = $datafim;
    }

    public function getSituacao(){
        return $this->situacao;
    }
    public function setSituacao($situacao){
        $this->situacao = $situacao;
    }
    public function setNomeCliente($nomecliente){
        $this->nomecliente = $nomecliente;
    }    
    public function getNomeCliente(){
        return $this->nomecliente;
    }
    public function setModeloVeiculo($modeloveiculo){
        $this->modeloveiculo = $modeloveiculo;
    }
    public function getModeloVeiculo(){
        return $this->modeloveiculo;
    }


}

class aluguelDao extends DAO{
    public function inserirAluguel($aluguel){
        $con=$this->conecta();
        $sql= "INSERT INTO aluguel (cliente,veiculo,preco,dataInicio,dataFim,situacao) values (?,?,?,?,?,?)";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$aluguel->getCliente());
        $stm->bindValue(2,$aluguel->getVeiculo());
        $stm->bindValue(3,$aluguel->getPreco());
        $stm->bindValue(4,$aluguel->getDataInicio());
        $stm->bindValue(5,$aluguel->getDataFim());
        $stm->bindValue(6,$aluguel->getSituacao());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm=NULL;
        $con=null;
        return $res;
    }

    public function deletaAluguel($aluguel){
        $con=$this->conecta();
        $sql="DELETE FROM aluguel where codigo=?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$aluguel->getCodigo());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm=NULL;
        $con=null; 
        return $res;
    }

    public function alteraAluguel($aluguel){
        $con=$this->conecta();
        $sql ="UPDATE aluguel SET dataInicio=?, dataFim=?,preco=?,situacao=?,cliente=?,veiculo=?
            WHERE codigo =?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$aluguel->getDataInicio());
        $stm->bindValue(2,$aluguel->getDataFim());
        $stm->bindValue(3,$aluguel->getPreco());
        $stm->bindValue(4,$aluguel->getSituacao());
        $stm->bindValue(5,$aluguel->getCliente());
        $stm->bindValue(6,$aluguel->getVeiculo());
        $stm->bindValue(7,$aluguel->getCodigo());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm=NULL;
        $con=null; 
        return $res;
    }

    public function listaAluguel(){
        $con = $this->conecta();
        $sql="SELECT aluguel.codigo as codigo,cliente.codigo as cliente,cliente.nome as nomecliente,
            veiculo.codigo as codveiculo, veiculo.modelo as modeloveiculo,aluguel.preco as preco,
            aluguel.datainicio as datainicio ,aluguel.datafim as datafim,
            aluguel.situacao as situacao
            FROM aluguel
            JOIN cliente ON aluguel.cliente = cliente.codigo
            JOIN veiculo ON aluguel.veiculo = veiculo.codigo";
        $stm = $con->prepare($sql);
        $tabela=$stm->execute();
        $alugueis = array();

        if($tabela){
            while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                $alug = new aluguel($linha['cliente'],$linha['codveiculo'],
                        $linha['preco'],$linha['datainicio'],$linha['datafim'],
                            $linha['situacao']);
                $alug->setCodigo(intval($linha['codigo']));
                $alug->setNomeCliente($linha['nomecliente']);
                $alug->setModeloVeiculo($linha['modeloveiculo']);
                array_push($alugueis,$alug);
            }
        }

        $stm->closeCursor();
        $stm=NULL;
        $con = NULL;
        return $alugueis;
    }

    public function buscaAluguel($codigo){
        $con = $this->conecta();
        $sql = "SELECT * FROM (SELECT aluguel.codigo as codigo,cliente.codigo as cliente,cliente.nome as nomecliente,
            veiculo.codigo as veiculo, veiculo.modelo as modeloveiculo,aluguel.preco as preco,
            aluguel.datainicio as datainicio ,aluguel.datafim as datafim,
            aluguel.situacao as situacao
            FROM aluguel
            JOIN cliente ON aluguel.cliente = cliente.codigo
            JOIN veiculo ON aluguel.veiculo = veiculo.codigo ) as aluguel
                where codigo = ?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1,$codigo);
        $tabela = $stm->execute();

        if($tabela){
                $linha = $stm->fetch(PDO::FETCH_ASSOC);
                $alug = new aluguel($linha['cliente'],$linha['veiculo'],
                        $linha['preco'],$linha['datainicio'],$linha['datafim'],
                            $linha['situacao']);
                $alug->setCodigo(intval($linha['codigo']));
                $alug->setNomeCliente($linha['nomecliente']);
                $alug->getNomeCliente($linha['nomecliente']);
                $alug->setModeloVeiculo($linha['modeloveiculo']);
                $alug->getModeloVeiculo($linha['modeloveiculo']);

            
        }
        $stm->closeCursor();
        $stm=NULL;
        $con = NULL;
        return $alug;
    } 
}