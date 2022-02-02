<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../class/veiculo.php');

$cod = intval($_POST["cod"]);    
$modelo=$_POST["modelo"];
$placa=$_POST["placa"]; 

$vei = new veiculo($modelo,$placa);
$vei->setCodigo($cod);
$veidao = new veiculoDAO();
$veidao->alteraVeiculo($vei);

header("Location: ./mostrarveic.php");
?>

