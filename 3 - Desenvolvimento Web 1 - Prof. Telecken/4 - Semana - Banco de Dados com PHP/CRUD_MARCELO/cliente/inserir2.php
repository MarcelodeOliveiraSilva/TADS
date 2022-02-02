<?php
include '../func/conectar.php';
$con=conecta();

//montar string com os dados do form    
$nome=$_POST["nome"];
$telefone=$_POST["telefone"];  
$query= "INSERT INTO cliente (nome,telefone) values ('$nome','$telefone')";

//inserir
pg_query($con, $query);

pg_close($con);
header("Location: ./selecionar.php");
?>