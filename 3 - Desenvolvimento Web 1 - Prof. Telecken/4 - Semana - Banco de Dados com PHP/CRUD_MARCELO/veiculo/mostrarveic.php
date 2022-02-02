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
$query='SELECT * FROM veiculo';
$result=pg_query($con,$query);

        echo "<table border = '1'>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Modelo</th>";
        echo "<th>Placa</th>";
        echo "<th></th>";
        echo "<th></th>";        
        echo "</tr>";

if($result)
{
	while ($row=pg_fetch_assoc($result))
	{
        $codigo=$row['codigo'];
        $modelo=$row['modelo'];
        $placa=$row['placa'];

        echo "<tr>";
        echo "<td>".$codigo."</td>";
        echo "<td>".$modelo."</td>";
        echo "<td>".$placa."</td>";
        echo "<td><a href='./excluirveic.php?cod=$codigo'><button>Excluir</button></a></td>";
        echo "<td><a href='./editarveic.php?cod=$codigo'><button>Editar</button></a></td>";  
	}
        echo "</table>";
}

pg_close($con);
?>
<br><br>
<a href='./inserirveic.php'><button>Inserir</button></a>
<br> <br><br> <br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>
