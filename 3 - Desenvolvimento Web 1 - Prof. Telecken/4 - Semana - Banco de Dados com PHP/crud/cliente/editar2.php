<?php
include '../func/conectar.php';
$con=conecta();

 $codigo = $_POST["cod"];    
 $nome=$_POST["nome"];
 $cpf=$_POST["cpf"];  
 $query ="UPDATE cliente SET nome = '$nome', cpf= '$cpf' WHERE codigo = $codigo";
 //echo $query;
 //editar
 pg_query($con, $query);
 
pg_close($con);
header("Location: ./selecionar.php");
?>

