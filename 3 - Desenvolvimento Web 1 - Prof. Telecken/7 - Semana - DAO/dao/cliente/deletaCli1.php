<?php
 ini_set('display_errors',1);
 ini_set('display_startup_errors',1);
 error_reporting(E_ALL);

 require_once('../class/cliente.php');
$cod = intval($_GET['cod']);
$clienteDao=new clienteDAO();
$cli=$clienteDao->buscar($cod);
$clienteDao->deletar($cli);
header("Location: ./mostraCli.php");

?>