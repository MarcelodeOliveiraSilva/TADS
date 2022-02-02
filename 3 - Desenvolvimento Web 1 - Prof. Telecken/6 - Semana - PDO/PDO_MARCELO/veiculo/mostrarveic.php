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
<h1>Veículos</h1>
<br>
<?php

$sql="SELECT codigo,modelo,placa FROM veiculo";
$stm = $con->prepare($sql);
$tabela=$stm->execute();

        echo "<table border = '1'>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Modelo</th>";
        echo "<th>Placa</th>";
        echo "<th></th>";
        echo "<th></th>";        
        echo "</tr>";

if($tabela)
{
	while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
        $codigo=$linha['codigo'];
        $modelo=$linha['modelo'];
        $placa=$linha['placa'];

        echo "<tr>";
        echo "<td>".$codigo."</td>";
        echo "<td>".$modelo."</td>";
        echo "<td>".$placa."</td>";
        echo "<td><a href='./excluirveic.php?cod=$codigo'><button>Excluir</button></a></td>";
        echo "<td><a href='./editarveic.php?cod=$codigo'><button>Editar</button></a></td>";  
	}
        echo "</table>";
}


echo "<br><br><a href='./inserirveic.php'><button>Inserir</button></a>";
$stm->closeCursor();
$stm=NULL;
$con = NULL;
?>
<br> <br><br> <br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>
