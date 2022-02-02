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

    $sql ="UPDATE aluguel SET dataInicio=?, dataFim=?,preco=?,situacao=?,cliente=?,veiculo=?
        WHERE codigo =?";
    $stm = $con->prepare($sql);
    $stm->bindValue(1,$datainicio);
    $stm->bindValue(2,$datafim);
    $stm->bindValue(3,$preco);
    $stm->bindValue(4,$situacao);
    $stm->bindValue(5,$cliente);
    $stm->bindValue(6,$veiculo);
    $stm->bindValue(7,$codigo);
    $res = $stm->execute();
 
 $stm->closeCursor();
 $stm=NULL;
 $con=null; 

header("Location: mostraralug.php");
?>

