<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once('../class/veiculo.php');

$modelo=$_POST["modelo"];
$placa=$_POST["placa"]; 

$veiculoDao=new veiculoDAO();
$vei=new veiculo($modelo,$placa);
$veiculoDao->inserirVeiculo($vei);

header("Location: ./mostrarveic.php");
?>
