<?php
include '../func/pdoConecta.php';
$con = conectaBD();

$nome=$_POST["nome"];
$cpf=$_POST["cpf"];  

$sql = "INSERT INTO cliente (nome, cpf) VALUES (?, ?)";
$stm = $con->prepare($sql);
$stm->bindValue(1,$nome);
$stm->bindValue(2,$cpf);
$res = $stm->execute();

$stm->closeCursor();
$stm=NULL;
$con=null;
header("Location: ./pdoSeleciona.php");

?>