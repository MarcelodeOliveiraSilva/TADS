<?php
include '../func/conectar.php';
$con=conecta();

 $codigo = $_POST["cod"];    
 $nome=$_POST["nome"];
 $telefone=$_POST["telefone"]; 

 $sql ="UPDATE cliente SET nome=?, telefone= ? WHERE codigo = ?";
 $stm = $con->prepare($sql);
 $stm->bindValue(1,$nome);
 $stm->bindValue(2,$telefone);
 $stm->bindValue(3,$codigo);
 $res = $stm->execute();
 
 $stm->closeCursor();
 $stm=NULL;
 $con=null; 
header("Location: ./selecionar.php");
?>

