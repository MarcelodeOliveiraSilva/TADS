<?php
include '../func/conectar.php';
$con=conecta();

 $codigo = $_POST["cod"];    
 $nome=$_POST["nome"];
 $telefone=$_POST["telefone"];  
 $query ="UPDATE cliente SET nome = '$nome', telefone= '$telefone' WHERE codigo = $codigo";
 //echo $query;
 //editar
 pg_query($con, $query);
 
pg_close($con);
header("Location: ./selecionar.php");
?>

