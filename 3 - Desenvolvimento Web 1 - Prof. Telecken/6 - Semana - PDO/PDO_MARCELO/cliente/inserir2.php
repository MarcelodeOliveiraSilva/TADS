<?php
include '../func/conectar.php';
$con=conecta();

$nome=$_POST["nome"];
$telefone=$_POST["telefone"]; 

$sql= "INSERT INTO cliente (nome,telefone) values (?,?)";

$stm = $con->prepare($sql);
$stm->bindValue(1,$nome);
$stm->bindValue(2,$telefone);
$res = $stm->execute();

$stm->closeCursor();
$stm=NULL;
$con=null;

header("Location: ./selecionar.php");
?>