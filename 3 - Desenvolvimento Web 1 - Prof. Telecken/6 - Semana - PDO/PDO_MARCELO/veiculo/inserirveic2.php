<?php
include '../func/conectar.php';
$con=conecta();

$modelo=$_POST["modelo"];
$placa=$_POST["placa"]; 

$sql= "INSERT INTO veiculo (modelo,placa) values (?,?)";
$stm = $con->prepare($sql);
$stm->bindValue(1,$modelo);
$stm->bindValue(2,$placa);
$res = $stm->execute();

$stm->closeCursor();
$stm=NULL;
$con=null;
header("Location: ./mostrarveic.php");
?>
