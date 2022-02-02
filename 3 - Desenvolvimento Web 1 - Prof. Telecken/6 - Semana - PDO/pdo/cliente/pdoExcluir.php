<?php
include '../func/pdoConecta.php';
$con = conectaBD();

$codigo = $_GET["cod"]; 

$sql="DELETE FROM cliente where codigo=?";
$stm = $con->prepare($sql);
$stm->bindValue(1,$codigo);
$res = $stm->execute();

$stm->closeCursor();
$stm=NULL;
$con=null; 
header("Location: ./pdoSeleciona.php");

?>