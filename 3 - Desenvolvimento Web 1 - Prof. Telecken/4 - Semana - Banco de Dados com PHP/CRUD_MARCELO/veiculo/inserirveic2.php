<?php
include '../func/conectar.php';
$con=conecta();

//montar string com os dados do form    
$modelo=$_POST["modelo"];
$placa=$_POST["placa"];  
$query= "INSERT INTO veiculo (modelo,placa) values ('$modelo','$placa')";

//inserir
pg_query($con, $query);

pg_close($con);
header("Location: ./mostrarveic.php");
?>
