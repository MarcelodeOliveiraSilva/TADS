<?php
include '../func/conectar.php';
$con=conecta();

//montar string com os dados do form    
    $nome=$_POST["nome"];
    $relacao=$_POST["relacao"];
    $cliente=$_POST["cliente"];  
    $query= "INSERT INTO dependente (nome,relacao,cliente) values ('$nome','$relacao', $cliente)";
   // echo $query;
   
    //inserir
    pg_query($con, $query);
    

pg_close($con);
header("Location: mostrarDep.php");
?>

