<?php
include '../func/conectar.php';
$con=conecta();

$codigo = $_GET["cod"]; 
//echo $codigo;
$comando="DELETE FROM cliente where codigo=$codigo";
//echo $comando;
pg_query($con,$comando);

pg_close($con);
header("Location: ./selecionar.php");
?>

