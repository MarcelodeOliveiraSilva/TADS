<?php
include '../func/conectar.php';
$con=conecta();

//codigo para alterar os dados do BD
$codigo = $_POST["codigo"];    
 $nome=$_POST["nome"];
 $cliente=$_POST["cliente"];  
 $relacao=$_POST["relacao"];
 $query ="UPDATE dependente SET nome = '$nome', cliente= $cliente, relacao='$relacao' WHERE codigo = $codigo";
 //echo $query;
 //editar
 pg_query($con, $query);
 
pg_close($con);
header("Location: mostrarDep.php");
?>

