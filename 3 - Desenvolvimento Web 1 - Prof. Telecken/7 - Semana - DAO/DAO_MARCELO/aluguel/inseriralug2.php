<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../class/aluguel.php');

    $cliente=$_POST["cliente"];
    $veiculo=$_POST["veiculo"];
    $preco=$_POST["preco"];
    $datainicio=$_POST["dataInicio"];
    $datafim=$_POST["dataFim"];
    $situacao=$_POST["situacao"];

$aluguelDao=new aluguelDAO();
$alug=new aluguel($cliente,$veiculo,$preco,$datainicio,$datafim,$situacao);
$aluguelDao->inserirAluguel($alug);


header("Location: mostraralug.php");
?>

