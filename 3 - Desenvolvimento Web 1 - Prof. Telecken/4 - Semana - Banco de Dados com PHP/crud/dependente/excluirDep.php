<?php
include '../func/conectar.php';
$con=conecta();


//codigo para a exclusao
$codigo = $_GET["cod"]; 
//echo $codigo;
$comando="DELETE FROM dependente where codigo=$codigo";
//echo $comando;
pg_query($con,$comando);

pg_close($con);
header("Location: mostrarDep.php");
?>

