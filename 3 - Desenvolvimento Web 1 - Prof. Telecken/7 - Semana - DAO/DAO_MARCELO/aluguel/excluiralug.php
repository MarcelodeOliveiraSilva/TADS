<?php
 ini_set('display_errors',1);
 ini_set('display_startup_errors',1);
 error_reporting(E_ALL);

 require_once('../class/aluguel.php');


$cod = intval($_GET['cod']);
$aluguelDao=new aluguelDAO();
$alug=$aluguelDao->buscaAluguel($cod);
$aluguelDao->deletaAluguel($alug);

header("Location: ./mostraralug.php");
?>

