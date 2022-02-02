<?php
include '../func/conectar.php';
$con=conecta();

//montar string com os dados do form    
$nome=$_POST["nome"];
$cpf=$_POST["cpf"];  
$query= "INSERT INTO cliente (nome,cpf) values ('$nome','$cpf')";

//inserir
pg_query($con, $query);

pg_close($con);
header("Location: ./selecionar.php");
?>