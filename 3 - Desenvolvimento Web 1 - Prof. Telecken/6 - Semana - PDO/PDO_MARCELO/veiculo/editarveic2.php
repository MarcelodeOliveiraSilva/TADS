<?php
include '../func/conectar.php';
$con=conecta();

 $codigo = $_POST["cod"];    
 $modelo=$_POST["modelo"];
 $placa=$_POST["placa"]; 

 $sql ="UPDATE veiculo SET modelo =?, placa= ? WHERE codigo = ?";
 $stm = $con->prepare($sql);
 $stm->bindValue(1,$modelo);
 $stm->bindValue(2,$placa);
 $stm->bindValue(3,$codigo);
 $res = $stm->execute();
 
 $stm->closeCursor();
 $stm=NULL;
 $con=null; 


header("Location: ./mostrarveic.php");
?>

