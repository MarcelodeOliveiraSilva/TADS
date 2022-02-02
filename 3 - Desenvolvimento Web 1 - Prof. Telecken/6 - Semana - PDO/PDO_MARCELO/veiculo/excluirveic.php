<?php
include '../func/conectar.php';
$con=conecta();

$codigo = $_GET["cod"]; 

$sql="DELETE FROM veiculo where codigo=?";
$stm = $con->prepare($sql);
$stm->bindValue(1,$codigo);
$res = $stm->execute();

$stm->closeCursor();
$stm=NULL;
$con=null; 

header("Location: ./mostrarveic.php");
?>

