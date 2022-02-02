<?php
include '../func/conectar.php';
$con=conecta();

$codigo = $_GET["cod"];
$sql="SELECT codigo,modelo,placa FROM veiculo where codigo=?";
$stm = $con->prepare($sql);
$stm->bindValue(1,$codigo);
$result = $stm->execute();


if($result)
{
	while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
        $codigo=$linha['codigo'];
        $modelo=$linha['modelo'];
        $placa=$linha['placa'];     
	}
}
$stm->closeCursor();
$stm=NULL;
$con=null; 
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
