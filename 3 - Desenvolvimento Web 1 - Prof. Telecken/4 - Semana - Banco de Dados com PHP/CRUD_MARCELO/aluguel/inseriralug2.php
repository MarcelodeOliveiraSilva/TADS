<?php
include '../func/conectar.php';
$con=conecta();

//montar string com os dados do form    
    $cliente=$_POST["cliente"];
    $veiculo=$_POST["veiculo"];
    $preco=$_POST["preco"];
    $datainicio=$_POST["dataInicio"];
    $datafim=$_POST["dataFim"];
    $situacao=$_POST["situacao"];
    $query= "INSERT INTO aluguel (dataInicio,dataFim,preco,situacao,cliente,veiculo)
        values ('$datainicio','$datafim','$preco','$situacao','$cliente','$veiculo');";
   // echo $query;
   
    //inserir
    pg_query($con, $query);
    

pg_close($con);
header("Location: mostraralug.php");
?>

