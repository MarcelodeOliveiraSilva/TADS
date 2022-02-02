<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once('../class/cliente.php');

$nome=$_POST["nome"];
$telefone=$_POST["telefone"]; 

$clienteDao=new clienteDAO();
$cli=new cliente($nome,$telefone);
$clienteDao->inserirCliente($cli);

header("Location: ./selecionar.php");
?>