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

$query='SELECT * FROM cliente';
$result=pg_query($con,$query);


        echo "<table border = '1'>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Nome</th>";
        echo "<th>Telefone</th>";
        echo "<th></th>";
        echo "<th></th>";        
        echo "</tr>";

if($result)
{
	while ($row=pg_fetch_assoc($result))
	{

        $codigo=$row['codigo'];
        $nome=$row['nome'];
        $telefone=$row['telefone'];
     
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

pg_close($con);
?>
<br><br>
<a href='./inserir.php'><button>Inserir</button></a>
<br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>
