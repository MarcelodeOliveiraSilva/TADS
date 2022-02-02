<?php
include '../func/pdoConecta.php';
$con = conectaBD();
    
 $nome=$_POST["nome"];
 $cpf=$_POST["cpf"]; 
 $codigo =$_POST["cod"]; 

 $sql="update cliente set nome=? ,cpf=? where codigo= ?";
 $stm = $con->prepare($sql);
 $stm->bindValue(1,$nome);
 $stm->bindValue(2,$cpf);
 $stm->bindValue(3,$codigo);
 $res = $stm->execute();
 
 $stm->closeCursor();
 $stm=NULL;
 $con=null; 
header("Location: ./pdoSeleciona.php");

?>