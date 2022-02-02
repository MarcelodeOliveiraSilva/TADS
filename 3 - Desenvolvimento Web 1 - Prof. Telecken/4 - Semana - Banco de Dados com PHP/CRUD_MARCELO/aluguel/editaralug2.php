<?php
include '../func/conectar.php';
$con=conecta();

//codigo para alterar os dados do BD
    $codigo = $_POST["codigo"];
    $cliente=$_POST["cliente"];
    $veiculo=$_POST["veiculo"];
    $preco=$_POST["preco"];
    $datainicio=$_POST["dataInicio"];
    $datafim=$_POST["dataFim"];
    $situacao=$_POST["situacao"];
    $query ="UPDATE aluguel SET dataInicio = '$datainicio', dataFim = '$datafim',
        preco = '$preco', situacao = '$situacao', cliente = '$cliente', veiculo = '$veiculo'
            WHERE codigo = '$codigo'";

 //echo $query;
 //editar
 pg_query($con, $query);
 
pg_close($con);
header("Location: mostraralug.php");
?>

