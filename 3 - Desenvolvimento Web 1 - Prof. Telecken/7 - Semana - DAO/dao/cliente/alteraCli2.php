<?php
 ini_set('display_errors',1);
 ini_set('display_startup_errors',1);
 error_reporting(E_ALL);

require_once('../class/cliente.php');

$cod = intval($_POST['cod']);
$nome= $_POST['nome'];
$cpf= $_POST['cpf'];

$cli = new cliente($nome,$cpf);
$cli->setCod($cod);
$clidao = new clienteDAO();
$clidao->alterar($cli);
header("Location: ./mostraCli.php");


?>