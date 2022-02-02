<?php
 ini_set('display_errors',1);
 ini_set('display_startup_errors',1);
 error_reporting(E_ALL);

 require_once('../class/veiculo.php');
$cod = intval($_GET['cod']);
$veiculoDao=new veiculoDAO();
$vei=$veiculoDao->buscaVeiculo($cod);
$veiculoDao->deletaVeiculo($vei);
header("Location: ./mostrarveic.php");
?>

