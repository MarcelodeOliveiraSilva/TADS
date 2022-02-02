<?php
include '../func/pdoConecta.php';
$con = conectaBD();

$sql = "SELECT codigo, nome, cpf FROM cliente";
$stm = $con->prepare($sql);
$tabela=$stm->execute();
if($tabela){

    //PDO::FETCH_ALL, PDO::FETCH_ARRAY
    while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
        $codigo=$linha['codigo'];
        $nome=$linha['nome'];
        $cpf=$linha['cpf']; 

        echo "<br> Nome:$nome CPF:$cpf 
        ... <a href='./pdoExcluir.php?cod=$codigo'>Excluir</a>
        ... <a href='./pdoEditar.php?cod=$codigo'>Editar</a> ";
    }
}

echo "<br><br><a href='./pdoInsere.php'>Inserir</a>";
$stm->closeCursor();
$stm=NULL;
$con = NULL;
?>