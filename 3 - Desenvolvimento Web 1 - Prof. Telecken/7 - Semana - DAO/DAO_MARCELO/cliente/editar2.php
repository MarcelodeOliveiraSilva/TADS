<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../class/cliente.php');

$cod = intval($_POST["cod"]);    
$nome=$_POST["nome"];
$telefone=$_POST["telefone"]; 

$cli = new cliente($nome,$telefone);
$cli->setCodigo($cod);
$clidao = new clienteDAO();
$clidao->alteraCliente($cli);

header("Location: ./selecionar.php");
?>

