<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../class/veiculo.php');

$veiculoDao=new veiculoDAO();
$veiculos=$veiculoDao->listaVeiculo(); ?>

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

        echo "<table border = '1'>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Modelo</th>";
        echo "<th>Placa</th>";
        echo "<th></th>";
        echo "<th></th>";        
        echo "</tr>";

foreach ($veiculos as $vei){
        $codigo=$vei->getCodigo();
        $modelo=$vei->getModelo();
        $placa=$vei->getPlaca();

        echo "<tr>";
        echo "<td>".$codigo."</td>";
        echo "<td>".$modelo."</td>";
        echo "<td>".$placa."</td>";
        echo "<td><a href='./excluirveic.php?cod=$codigo'><button>Excluir</button></a></td>";
        echo "<td><a href='./editarveic.php?cod=$codigo'><button>Editar</button></a></td>";  
}
echo "</table>";
echo "<br><br><a href='./inserirveic.php'><button>Inserir</button></a>";

?>
<br> <br><br> <br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>
