<?php
include '../func/conectar.php';
$con=conecta();

$codigo = $_GET["cod"];
//echo $codigo;
$query="SELECT * FROM veiculo where codigo=$codigo";
//echo $query;
$result=pg_query($con,$query);
//mesmo selecionando apenas uma linha é preciso um laço para acessar seus valores
if($result)
{
	while ($row=pg_fetch_assoc($result))
	{
        $codigo=$row['codigo'];
        $modelo=$row['modelo'];
        $placa=$row['placa'];     
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<?php include("../Includes/Header.php"); ?>
</head>
<body>
<?php include("../Includes/Main.php"); ?>
<h1>Editar Veículo</h1>

  <br> <br>
  <form method="POST" action="./editarveic2.php">
     Modelo: <input type="text" name="modelo" value="<?php echo $modelo;?>"> <br /><br> 
     Placa: <input type="text" name="placa" value="<?php echo $placa;?>"> <br /><br>
     <input type="hidden" name="cod" value="<?php echo $codigo;?>"> <br />
    <hr />
    <input type="submit" name="submit" value="editar">
  </form>
<br> <br><br> <br>
<?php
pg_close($con);
?>
<?php include("../Includes/footer.php"); ?>
</body>
</html>
