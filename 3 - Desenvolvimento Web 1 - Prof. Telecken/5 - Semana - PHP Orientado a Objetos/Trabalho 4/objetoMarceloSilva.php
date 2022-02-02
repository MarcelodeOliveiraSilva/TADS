<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


class pessoa{
    protected $nome;
    protected $cpf;

    public function __construct($nome,$cpf){
        $this->nome=$nome;
        $this->cpf=$cpf;
    }

    public function setNome($nome){
        $this->nome=$nome;
    }
    public function getNome(){
        return $this->nome;
    }

    public function setCPF($cpf){
        $this->cpf=$cpf;
    }
    public function getCPF(){
        return $this->cpf;
    }
}


class professor extends pessoa{
    protected $area;
    protected $telefone;

    public function __construct($nome,$cpf,$area,$telefone){
        parent::__construct($nome,$cpf);
        $this->area=$area;
        $this->telefone=$telefone;
    }

    public function imprimeProf(){
        $dado= "<BR>Nome: {$this->nome}<br/>CPF: {$this->cpf}<br/>Área: {$this->area}<br/>Telefone: {$this->telefone}";
        return $dado;
    }

    public function setArea($area){
        $this->area=$area;
    }
    public function getArea(){
        return $this->area;
    }

    public function setTelefone($telefone){
        $this->telefone=$telefone;
    }
    public function getTelefone(){
        return $this->telefone;
    }
   
}

class aluno extends pessoa{
    protected $matricula;

    public function __construct($nome,$cpf,$matricula){
        parent::__construct($nome,$cpf);
        $this->matricula=$matricula;
    }

        public function imprime(){
        $dado= "<BR>Nome: {$this->nome}<br/>CPF: {$this->cpf}<br/>Matrícula: {$this->matricula}<br/>";
        return $dado;
    }

    public function setMatricula($matricula){
        $this->matricula=$matricula;
    }
    public function getMatricula(){
        return $this->matricula;
    }
} 

class turma{
    protected $professor;
    protected $identificacao;
    protected $aluno;

    public function __construct($professor,$aluno,$identificacao){
        $this->professor=$professor;
        $this->alunos=$aluno;
        $this->identificacao=$identificacao;
    }

    public function setProfessor($professor){
        $this->professor=$professor;
    }
    public function getProfessor(){
        return $this->professor;
    }

    public function setIdentificacao($identificacao){
        $this->identificacao=$identificacao;
    }
    public function getIdentificacao(){
        return $this->identificacao;
    }

    public function setAluno($aluno){
        $this->aluno=$aluno;
    }
    public function getAluno(){
        return $this->aluno;
    }

    public function imprimeDados() {
        echo '<HR><br/>';
        echo "<b>-------------Professor------------</b>";
        echo $this->professor->imprimeProf();
        echo "<br/>";
        echo "<br/><b>--------------Alunos--------------</b>";
        foreach ($this->alunos as $value){
            echo $value->imprime();

        }
        echo "<br/><b>----------Identificação-----------</b><br/>";
        echo "{$this->identificacao}<br><br/>";
    }
} 

//criar 2 professores
$c1= new professor("Joao","123.456.789-01","Português","(12) 1234-5678");
$c2= new professor("Pedro","109.876.543-21","Matemática","(12) 8765-4321");

//criar 6 alunos
$c3= new aluno("Lucas","123.123.123-12","12345");
$c4= new aluno("Mateus","234.234.234-34","23456");
$c5= new aluno("Marcos","012.012.012-01","01234");
$c6= new aluno("Diego","345.345.345-34","34567");
$c7= new aluno("Thiago","456.456.456-45","45678");
$c8= new aluno("Paulo","567.567.567-56","56789");

//turma1 com 4 alunos
$turm1=array();
array_push($turm1,$c3,$c4,$c5,$c6);
$t1= new turma($c1,$turm1,"Português");
$t1->imprimeDados();

//turma2 com 4 alunos
$turm2=array();
array_push($turm2,$c5,$c6,$c7,$c8);
$t2= new turma($c2,$turm2,"Matemática");
$t2->imprimeDados();

?>
