<?php
include '../func/conectar.php';
$con=conecta();
?>

<!DOCTYPE html>
<html>
<head>
<?php include("../Includes/Header.php"); ?>
</head>
<body>
<?php include("../Includes/Main.php"); ?>
<h1>Clientes</h1>
<br>
<?php

$sql = "SELECT codigo, nome, telefone FROM cliente";
$stm = $con->prepare($sql);
$tabela=$stm->execute();

        echo "<table border = '1'>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Nome</th>";
        echo "<th>Telefone</th>";
        echo "<th></th>";
        echo "<th></th>";        
        echo "</tr>";

if($tabela)
{
	while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
        $codigo=$linha['codigo'];
        $nome=$linha['nome'];
        $telefone=$linha['telefone'];
     
        echo "<tr>";
        echo "<td>".$codigo."</td>";
        echo "<td>".$nome."</td>";
        echo "<td>".$telefone."</td>" ;
        echo "<td><a href='./excluir.php?cod=$codigo'><button>Excluir</button></a>";
        echo "<td><a href='./editar.php?cod=$codigo'><button>Editar</button></a><BR>";
        echo "</tr>";
	}
}
echo "</table>";
echo "<br><br><a href='./inserir.php'><button>Inserir</button></a>";
$stm->closeCursor();
$stm=NULL;
$con = NULL;
?>
<br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>
