<?php
include '../func/conectar.php';
$con=conecta();

 $codigo = $_POST["cod"];    
 $modelo=$_POST["modelo"];
 $placa=$_POST["placa"];  
 $query ="UPDATE veiculo SET modelo = '$modelo', placa= '$placa' WHERE codigo = $codigo";
 //echo $query;
 //editar
 pg_query($con, $query);
 
pg_close($con);
header("Location: ./mostrarveic.php");
?>

