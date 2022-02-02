<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

class produto
{
    protected $descricao;
    protected $preco;

    public function __construct($desc,$pre)
    {
        $this->descricao=$desc;
        $this->preco=$pre;
    }
    public function imprime(){
        $dado= "<BR>Descricao:{$this->descricao}.....Preço:{$this->preco}";
        return $dado;
    }
}

class calcado extends produto{
    protected $tamanho;
    protected $fornecedor;
    public function __construct($desc,$pre,$tam,$forn){
        parent::__construct($desc,$pre);
        $this->tamanho=$tam;
        $this->fornecedor=$forn;
    }
   
} 
class camisa extends produto{
    protected $tipo;
    public function __construct($desc,$pre,$tip){
        parent::__construct($desc,$pre);
        $this->tipo=$tip;
    }
} 
class nota{
    protected $cliente;
    protected $data;
    protected $produtos;

    public function __construct($cliente,$data,$produtos){
        $this->cliente=$cliente;
        $this->data=$data;
        $this->produtos=$produtos;
    }
    public function imprimeNota() {
        echo '<HR>';
        echo "Cliente:{$this->cliente}<br>";
        echo "Data:{$this->data}<br>";
        echo "--------------Produtos--------------";
        foreach ($this->produtos as $value){
            echo $value->imprime();

        }
        echo '<hr>';
    }
} 

$c1= new calcado("sapatênis","130,00",39,"sap");
$c2= new camisa("lisa","100,00","verão");
$c3= new camisa("lisa","150,00","Inverno");
$prods=array();
array_push($prods,$c1,$c2,$c3);
$n= new nota("Fulano de Tal","12/12/2020",$prods);
$n->imprimeNota();

?>
